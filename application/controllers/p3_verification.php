<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P3_Verification extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(config_item('accounting_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['comments_view'] = 'admin/comments';
		$this->load->model('members');
		$this->load->model('member_loans');
		$this->load->model('member_loan_statuses');
		$this->load->model('member_loan_details');
		$this->load->model('member_loan_comments');
		$this->data['queue'] = 'verification';
		$this->data['view_only'] = FALSE;
		$this->data['site_title'] = 'Pangarap na Pondo sa Palengke';
		$this->data['page_title'] = 'Pangarap na Pondo sa Palengke';
		$this->data['sub_page_title'] = '';
	}

	

	public function index()
	{
	
		$this->data['verification_queue'] = TRUE;
		$this->data['my_verification_queue'] = FALSE;
		$this->db->where('handled_by', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('verified_by', 0);
		$this->db->where('disapproved_by', 0);
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
		$this->session->set_userdata('referred_from', uri_string());
		$this->db->order_by('date_of_filing desc,name');
		$this->db->where('handled_by', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('verified_by', 0);
		$this->db->where('disapproved_by', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['member_loans'] = $this->member_loans->get_loans();
		
		$this->data['site_title'] = 'Market Vendor Loans for Verification';
		$this->data['page_title'] = 'Market Vendor Loans for Verification';
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/p3_verification/index');

	}

	public function disapproved_loans()
	{
		

		$this->data['queue'] = 'disapproved_loans';
		
		$this->db->where('disapproved_by', $this->session->userdata('user_id'));
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
		$this->db->where('disapproved_by', $this->session->userdata('user_id'));
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['member_loans'] = $this->member_loans->get_loans();
		
		$this->data['site_title'] = 'Disapproved Market Vendor Loans';
		$this->data['page_title'] = 'Disapproved Market Vendor Loans';
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->session->set_userdata('referred_from', uri_string());
		$this->load_view('admin/p3_verification/index');

	}

	public function approved_loans()
	{
		

		$this->data['queue'] = 'approved_loans';
		

		
		$this->db->where('verified_by', $this->session->userdata('user_id'));
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
		$this->db->where('verified_by', $this->session->userdata('user_id'));
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['member_loans'] = $this->member_loans->get_loans();
		
		$this->data['site_title'] = 'Approved Market Vendor Loans';
		$this->data['page_title'] = 'Approved Market Vendor Loans';
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->session->set_userdata('referred_from', uri_string());
		$this->load_view('admin/p3_verification/index');

	}

	public function my_queue()
	{
		

		$this->data['queue'] = 'my_queue';
		
		$this->db->where('handled_by', $this->session->userdata('user_id'));
		$this->db->where('verified_by', 0);
		$this->db->where('disapproved_by', 0);
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
		$this->db->where('handled_by', $this->session->userdata('user_id'));
		$this->db->where('verified_by', 0);
		$this->db->where('disapproved_by', 0);
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['member_loans'] = $this->member_loans->get_loans();
		
		$this->data['site_title'] = 'My Assigned Market Vendor Loans for Verification';
		$this->data['page_title'] = 'My Assigned Market Vendor Loans for Verification';
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->session->set_userdata('referred_from', uri_string());
		$this->load_view('admin/p3_verification/index');

	}	

	public function assigned_to_me($id = NULL)
	{
		
		if ($id) 
		{
			$this->db->where('handled_by', 0);
			$this->db->where('finalized_by >', 0);
			$this->db->where('verified_by', 0);
			$this->db->where('disapproved_by', 0);
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
				$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
				redirect('p3_verification', 'refresh');
			}
			$this->data['page_title'] = 'Assigning Market Vendor Loan - ' . $this->data['member_loan']->transaction_no;
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
			redirect('p3_verification', 'refresh');	
		}

		$_POST['handled_by'] = $this->session->userdata('user_id');
		$data = $this->member_loans->array_from_post(array(
			'handled_by', 
			)
		);

			
		$this->member_loans->save($data, $id);
		redirect('p3_verification/my_queue', 'refresh');
		
	}

	public function returned_to_queue($id = NULL)
	{
		
		if ($id) 
		{
			$this->db->where('handled_by >', 0);
			$this->db->where('finalized_by >', 0);
			$this->db->where('verified_by', 0);
			$this->db->where('disapproved_by', 0);
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
				$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
				// redirect('p3_verification', 'refresh');
			}
			$this->data['page_title'] = 'Assigning Market Vendor Loan - ' . $this->data['member_loan']->transaction_no;
		}
		else
		{
			$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
			redirect('p3_verification/my_queue', 'refresh');	
		}

		$_POST['handled_by'] = 0;
		$data = $this->member_loans->array_from_post(array(
			'handled_by', 
			)
		);

			
		$this->member_loans->save($data, $id);

		redirect('p3_verification', 'refresh');
		
	}

	

	public function view($id = NULL)
	{
		$this->load->library('user_agent');
		$this->data['back'] = $this->session->userdata('referred_from');
		$this->data['view_only'] = TRUE;
		// Fetch a group or create a new group
		if ($id) 
		{	
			if($this->data['back'] == 'p3_verification/my_queue')
			{
				$this->db->where('handled_by', $this->session->userdata('user_id'));
			}
			elseif($this->data['back'] == 'p3_verification/approved_loans')
			{
				$this->db->where('verified_by', $this->session->userdata('user_id'));
				
			}
			elseif($this->data['back'] == 'p3_verification/disapproved_loans')
			{
				$this->db->where('disapproved_by', $this->session->userdata('user_id'));
				
			}
			else
			{
				$this->db->where('verified_by', 0);	
				$this->db->where('disapproved_by', 0);	
			}
			$this->db->where('finalized_by >', 0);	
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
				$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
				redirect($this->data['back'], 'refresh');	
			}	
			$this->data['page_title'] = 'Viewing Market Vendor Loan - ' . $this->data['member_loan']->transaction_no;
			
		}
		else
		{
			
			$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
			redirect($this->data['back'], 'refresh');	
		}

		if($this->data['back'] == 'p3_verification/my_queue')
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('p3/'.$id.'/add_comment')."'><i class='fa fa-plus'></i> Add Comment</a>";

		
		
		$this->db->where('MemberLoanId',$id);
		$this->db->order_by('c_at desc');
		$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();

		$this->data['alerts_sidebar'] = TRUE;

		// Load the view
		$this->load_view('admin/p3_verification/view');
	}	


	
	public function add_comment($id = NULL)
	{

		$this->data['back'] = $this->session->userdata('referred_from');
		// Fetch a member or create a new member
		if ($id) 
		{
			$this->db->where('finalized_by >', 0);
			$this->db->where('handled_by', $this->session->userdata('user_id'));
			$this->db->where('verified_by', 0);
			$this->db->where('disapproved_by', 0);
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);
			
			if(!count($this->data['member_loan'])) {
					$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
				redirect('p3_verification/my_queue', 'refresh');
			}
			$this->data['page_title'] = 'New Comment for Market Vendor Loan - ' . $this->data['member_loan']->transaction_no;
			$this->user_activities->write($this->data['page_title']);
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
			redirect('p3_verification/my_queue', 'refresh');	
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
			redirect(site_url('p3_verification/my_queue'));
		}
		
		$this->db->where('MemberLoanId',$id);
		$this->db->order_by('c_at desc');
		$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();

		// echo $this->db->last_query();
		
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/p3_verification/add_comment');
	}

	public function edit($id = NULL)
	{
		
		$this->session->set_userdata('referred_from', uri_string());
		// Fetch a member or create a new member
		if ($id) 
		{
			$this->db->where('finalized_by >', 0);
			$this->db->where('verified_by', 0);
			$this->db->where('disapproved_by', 0);
			$this->db->where('handled_by', $this->session->userdata('user_id'));
			$this->db->where('LoanProgramId', config_item('p3_program_id'));
			$this->data['member_loan'] = $this->member_loans->get_loans($id);

			if(!count($this->data['member_loan'])) {
					$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
				redirect('p3', 'refresh');
			}
			$this->data['page_title'] = 'For Verification Member Loan - ' . $this->data['member_loan']->transaction_no;
			$this->user_activities->write($this->data['page_title']);
			$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('p3_verification/'.$id.'/add_comment')."'><i class='fa fa-plus'></i> Add Comment</a>";
			
		}
		else
		{
			$this->session->set_flashdata('error', 'Market Vendor Loan could not be found');
			redirect('p3_verification/my_queue', 'refresh');
		}

		$rules = $this->member_loans->no_rules;			
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
				
			$_POST['MemberLoanId'] = $id;
			if($_POST['btn_action'] == 'Disapproved'){
				$_POST['disapproved_by'] = $this->session->userdata('user_id');
				$_POST['disapproved_date'] = date('Y-m-d H:i:s');
				$data = $this->member_loan_statuses->array_from_post(array(
					'MemberLoanId', 
					'disapproved_by',
					'disapproved_date'
					)
				);
			}
			elseif($_POST['btn_action'] == 'Approved'){
				$_POST['verified_by'] = $this->session->userdata('user_id');
				$_POST['verified_date'] = date('Y-m-d H:i:s');
				$data = $this->member_loan_statuses->array_from_post(array(
					'MemberLoanId', 
					'verified_by',
					'verified_date'
					)
				);
			}
			
			$this->member_loan_statuses->save($data, $id);

			$_POST['handled_by'] = 0;
			$data = $this->member_loans->array_from_post(array(
				'handled_by', 
				)
			);
	
			$this->member_loans->save($data, $id);

			// redirect to member
			redirect(site_url('p3_verification/my_queue'));
		}

		
		$this->db->where('MemberLoanId',$id);
		$this->db->order_by('c_at desc');
		$this->data['comments'] = $this->member_loan_comments->get_member_loan_comments();
		
		
		$this->data['alerts_sidebar'] = FALSE;
		
		// Load the view
		$this->load_view('admin/p3_verification/edit');
	}

	
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
