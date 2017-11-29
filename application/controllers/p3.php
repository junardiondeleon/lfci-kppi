<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P3 extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		if(config_item('teller_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['comments_view'] = 'admin/comments';
		$this->load->model('members');
		$this->load->model('member_loans');
		$this->load->model('member_loan_statuses');
		$this->load->model('member_loan_details');
		$this->load->model('member_loan_comments');
		$this->data['view_only'] = FALSE;
		$this->data['confirmation_page'] = FALSE;
		$this->data['site_title'] = 'Pangarap na Pondo sa Palengke';
		$this->data['page_title'] = 'Pangarap na Pondo sa Palengke';
		$this->data['sub_page_title'] = '';
	}

	public function index()
	{
		 
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		// Set up pagination 
		$config['total_rows'] = $this->member_loans->count();
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		if($this->uri->segment(3) != '')
			$this->data['record_no'] = $this->uri->segment(3);	
		else
			$this->data['record_no'] = 0;
		// Create pagination links
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['box_title'] = '';
		// Retrieve paginated results, using the dynamically determined offset
		$this->db->limit($config['per_page'], $this->pagination->offset);

		if ($this->input->post('btn_action') == 'Submit') 
		{
			$this->form_validation->set_rules('keywords', 'Search', 'required|strtoupper');
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('p3')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "name") 
			{
				$this->db->like('name', $q, 'after');
			}
			elseif ($by == "transaction_no") 
			{
				$this->db->where('transaction_no', $q);
			}
			unset($this->data['pagination']);
		}

		

		// Fecth all member loans
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('p3/new')."'><i class='fa fa-plus'></i> New Loan</a>";
		$this->db->order_by('date_of_filing desc,name');
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('LoanProgramId', config_item('p3_program_id'));

		$this->data['member_loans'] = $this->member_loans->get_loans();


		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);

		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/p3/index');

	}

	

	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		$this->data['confirmation_page'] = FALSE;
		// Fetch a group or create a new group
		if ($id) 
		{
			
			$this->db->where_in('AreaId', $this->session->userdata('data_access'));
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
				$this->session->set_flashdata('error', 'Loan could not be found');
				redirect('p3', 'refresh');
				
			}	
			$this->data['page_title'] = 'Pangarap na Pondo sa Palengke';
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Loan could not be found');
			redirect('p3/index', 'refresh');	
		}
		
		$this->data['page_right_title'] = 'Transaction No - ' . $this->data['member_loan']->transaction_no;
		$this->data['sub_page_title_comment'] = "<a class='btn btn-info' href='".base_url('p3/'.$id.'/add_comment')."'><i class='fa fa-plus'></i> Add Comment</a>";
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['loan_terms'] = $this->member_loans->get_loan_terms();			
		
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['mode_of_payments'] = $this->member_loans->get_mode_of_payments();			

		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['life_insurances'] = $this->member_loans->get_life_insurances();			
		
		$this->db->where('MemberLoanId',$id);
		$this->db->order_by('c_at desc');
		$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();

		$this->data['alerts_sidebar'] = TRUE;

		// Load the view
		$this->load_view('admin/p3/view');
	}


	public function confirmation($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		$this->data['confirmation_page'] = TRUE;
		// Fetch a group or create a new group
		if ($id) 
		{			
			$this->db->where_in('AreaId', $this->session->userdata('data_access'));
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
				$this->session->set_flashdata('error', 'Loan could not be found');
				redirect('p3', 'refresh');
				
			}	
			$this->data['page_title'] = 'Pangarap na Pondo sa Palengke';
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Loan could not be found');
			redirect('p3/index', 'refresh');	
		}

		if(isset($_POST['btn_final']) and  $_POST['btn_final'] == 'Yes'){
			$_POST['MemberLoanId'] = $id;
			$_POST['finalized_by'] = $this->session->userdata('user_id');
			$_POST['finalized_date'] = date('Y-m-d H:i:s');
			$data = $this->member_loan_statuses->array_from_post(array(
				'MemberLoanId', 
				'finalized_by',
				'finalized_date'
				)
			);
			$this->member_loan_statuses->save($data, $id);
			redirect(site_url('p3/index'));
		}   
		
		$this->data['page_right_title'] = 'Transaction No - ' . $this->data['member_loan']->transaction_no;
		$this->data['sub_page_title_comment'] = "<a class='btn btn-info' href='".base_url('p3/'.$id.'/add_comment')."'><i class='fa fa-plus'></i> Add Comment</a>";
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['loan_terms'] = $this->member_loans->get_loan_terms();			
		
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['mode_of_payments'] = $this->member_loans->get_mode_of_payments();			

		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['life_insurances'] = $this->member_loans->get_life_insurances();			
		
		$this->db->where('MemberLoanId',$id);
		$this->db->order_by('c_at desc');
		$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();

		$this->data['alerts_sidebar'] = TRUE;

		// Load the view
		$this->load_view('admin/p3/view');
	}	


	public function disapproved_loans()
	{
		

		$this->data['queue'] = 'disapproved_loans';
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('disapproved_by >', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		// Set up pagination 

		$config['total_rows'] = count($this->member_loans->get_loans());
		$config['per_page'] = 15;
		$this->pagination->initialize($config);

		// Create pagination links
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['box_title'] = '';
		// Retrieve paginated results, using the dynamically determined offset
		$this->db->limit($config['per_page'], $this->pagination->offset);

		if ($this->input->post('btn_action') == 'Submit') 
		{
			$this->form_validation->set_rules('keywords', 'Search', 'required|strtoupper');
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('p3')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "name") 
			{
				$this->db->like('name', $q, 'after');
			}
			elseif ($by == "transaction_no") 
			{
				$this->db->where('transaction_no', $q);
			}
			unset($this->data['pagination']);
		}

		

		// Fecth all member loans
		
		$this->db->order_by('date_of_filing desc,name');
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('disapproved_by >', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['member_loans'] = $this->member_loans->get_loans();
		
		$this->data['site_title'] = 'Disapproved Pangarap na Pondo sa Palengke Loans';
		$this->data['page_title'] = 'Disapproved Pangarap na Pondo sa Palengke Loans';
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->session->set_userdata('referred_from', uri_string());
		$this->load_view('admin/p3_verification/index');

	}

	public function approved_loans()
	{
		

		$this->data['queue'] = 'approved_loans';
		

		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->db->where('verified_by >', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		// Set up pagination 

		$config['total_rows'] = count($this->member_loans->get_loans());
		$config['per_page'] = 15;
		$this->pagination->initialize($config);

		// Create pagination links
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['box_title'] = '';
		// Retrieve paginated results, using the dynamically determined offset
		$this->db->limit($config['per_page'], $this->pagination->offset);

		if ($this->input->post('btn_action') == 'Submit') 
		{
			$this->form_validation->set_rules('keywords', 'Search', 'required|strtoupper');
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('p3')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "name") 
			{
				$this->db->like('name', $q, 'after');
			}
			elseif ($by == "transaction_no") 
			{
				$this->db->where('transaction_no', $q);
			}
			unset($this->data['pagination']);
		}

		

		// Fecth all member loans
		
		$this->db->order_by('date_of_filing desc,name');
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->db->where('verified_by >', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['member_loans'] = $this->member_loans->get_loans();
		
		$this->data['site_title'] = 'Approved Pangarap na Pondo sa Palengke Loans';
		$this->data['page_title'] = 'Approved Pangarap na Pondo sa Palengke Loans';
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->session->set_userdata('referred_from', uri_string());
		$this->load_view('admin/p3/index');

	}

	
	public function add_comment($id = NULL)
	{


		// Fetch a member or create a new member
		if ($id) 
		{
			
			$this->db->where_in('AreaId', $this->session->userdata('data_access'));
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
					$this->session->set_flashdata('error', 'Pangarap na Pondo sa Palengke Loan could not be found');
				redirect('p3', 'refresh');
			}
			$this->data['page_title'] = 'New Comment for Pangarap na Pondo sa Palengke Loan - ' . $this->data['member_loan']->transaction_no;
			$this->user_activities->write($this->data['page_title']);
			
		}
		else
		{
			
			$this->session->set_flashdata('error', 'Pangarap na Pondo sa Palengke Loan could not be found');
			redirect('p3', 'refresh');
			
			
		}

		$rules = $this->member_loan_comments->rules;			
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store member loan id
			
			$_POST['MemberLoanId'] = $id;
			$_POST['UserId'] = $this->session->userdata('user_id');

			$data = $this->member_loan_comments->array_from_post(array(
				'MemberLoanId', 
				'UserId',
				'remarks'
				)
			);

			$this->member_loan_comments->save($data);

			// redirect to member
			redirect(site_url('p3/'.$id.'/add_comment'));
		}
		
		$this->db->where('MemberLoanId',$id);
		$this->db->order_by('c_at desc');
		$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();

		// echo $this->db->last_query();
		
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/p3/add_comment');
	}

	public function edit($id = NULL)
	{


		// Fetch a member or create a new member
		if ($id) 
		{
			$this->data['new_trans'] = FALSE;
			$this->db->where_in('AreaId', $this->session->userdata('data_access'));
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);

			if(!count($this->data['member_loan'])) {
					$this->session->set_flashdata('error', 'Loan could not be found');
				redirect('p3', 'refresh');
			}
			
			$this->data['page_right_title'] = 'Transaction No - ' . $this->data['member_loan']->transaction_no;
			$this->user_activities->write($this->data['page_title']);
			$this->data['sub_page_title_comment'] = "<a class='btn btn-info' href='".base_url('p3/'.$id.'/add_comment')."'><i class='fa fa-plus'></i> Add Comment</a>";
			$this->db->where('MemberLoanId',$id);
			$this->db->order_by('c_at desc');
			$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();
		}
		else
		{
			$this->data['new_trans'] = TRUE;
			
			$this->data['page_title'] = 'New Pangarap na Pondo sa Palengke Loan';
			$this->data['member_loan'] = $this->member_loans->get_new();

			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		$rules = $this->member_loans->rules;			
		if(isset($_POST['btn_save']))  {
			$min_amount = to_decimal($_POST['min_loanable_amount']);
			$max_amount = to_decimal($_POST['max_loanable_amount']);
			$rules['loan_amount']['rules'] .= '|less_than_equal_to['.$max_amount.']|greater_than_equal_to['.$min_amount.']';
		}
		$this->form_validation->set_rules($rules);
		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store member loan id
			
			
			$_POST['LoanProgramId'] = $this->config->item('p3_program_id');
			$_POST['AreaId'] = $this->session->userdata('area_id');
			$data = $this->member_loans->array_from_post(array(
				'MemberId', 
				'AreaId', 
				'LoanProgramId', 
				'LoanCategoryId', 
				'LoanTermId', 
				'ModeOfPaymentId', 
				'LifeInsuranceId', 
				'LoanTermId', 
				'min_loanable_amount',
				'max_loanable_amount',
				'loan_protection_insurance',
				'kapamilya_insurance',
				'loan_amount',
				'kasanib_fund',
				'total_cash_out',
				'total_account_receivable',
				'service_charge',
				'advance_interest',
				'net_proceeds',
				'notarial',
				'loan_amortization',
				'kasanib_amortization',
				'amortization_due',
				'start_of_payment',
				'maturity_date',
				'date_of_filing',
				'collector_id',
				)
			);

			
			$_POST['MemberLoanId'] = $this->member_loans->save($data, $id);

			
			$data = $this->member_loan_details->array_from_post(array(
				'MemberLoanId', 
				'name',
				'street_no',
				'barangay',
				'municipality',
				'province',
				'mobile_no',
				'business_type',
				'loan_program',
				'loan_category',
				'life_insurance',
				'mode_of_payment',
				'loan_term',
				'loan_requirements',
				'loan_collaterals',
				'loan_collateral_details',
				'collector_name',
				)
			);
			$data['loan_requirements'] = implode(",", $_POST['loan_requirements']);
			$data['loan_collaterals'] = implode(",", $_POST['loan_collaterals']);
			
			$this->member_loan_details->save($data, $id);

			if($_POST['btn_save'] == 'Save'){
				$data = $this->member_loan_statuses->array_from_post(array(
					'MemberLoanId', 
					)
				);
				$this->member_loan_statuses->save($data, $id);
			}

			// if($_POST['btn_save'] == 'Save as Final'){
			// 	$_POST['finalized_by'] = $this->session->userdata('user_id');
			// 	$_POST['finalized_date'] = date('Y-m-d H:i:s');
			// }   

			if($_POST['btn_save'] == 'Save as Final'){

				redirect(site_url('p3/'.$id.'/confirmation'));
				// $data = $this->member_loan_statuses->array_from_post(array(
				// 	'MemberLoanId', 
				// 	'finalized_by',
				// 	'finalized_date'
				// 	)
				// );
				// $this->member_loan_statuses->save($data, $id);
			}



			// redirect to member
			redirect(site_url('p3/index'));
		}
		
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('c.LoanProgramId', config_item('p3_program_id'));
		$this->data['members'] = $this->member_loans->get_members_dropdown();

		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['loan_terms'] = $this->member_loans->get_loan_terms();			
		
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['mode_of_payments'] = $this->member_loans->get_mode_of_payments();			

		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['loan_requirements'] = $this->member_loans->get_loan_requirements();			

		$this->data['loan_collectors'] = $this->member_loans->get_loan_collectors();			

		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['loan_collaterals'] = $this->member_loans->get_loan_collaterals();			

		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['life_insurances'] = $this->member_loans->get_life_insurances();			

		$this->data['alerts_sidebar'] = FALSE;
		
		// Load the view
		$this->load_view('admin/p3/edit');
	}

	

	public function delete($id = NULL)
	{
		// fetch data
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$member_loan = $this->member_loans->get_loans($id);

		if(!count($member_loan)) {
			$this->session->set_flashdata('error', 'PangaraP na pondo sa Palengke Loan could not be found');
			redirect('p3/index', 'refresh');
		}
		// process delete
		$this->members->delete($id);

		$message = "PangaraP na pondo sa Palengke Loan " . $member_loan->transaction_no . " has been successfully removed.";
		$this->user_activities->write($message);


		// redirect to project
		redirect(site_url('p3/index'));
	}

	
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
