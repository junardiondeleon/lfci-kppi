<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mode_of_Payment extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Mode of Payments';
		$this->data['page_title'] = 'Mode of Payments';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('mode_of_payments');
	}

	public function index()
	{
		// // Filter user account per user
		// if ($this->session->userdata('AccountType') !== 'S') 
		// {
		// 	$filter_user = array('user_id' => $this->session->userdata('Id'));
		// 	$this->db->where($filter_user);
		// }

		// Set up pagination 
		$config['total_rows'] = $this->mode_of_payments->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('mode_of_payment')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "mode_of_payment") 
			{
				$this->db->like('mode_of_payment', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		if ($this->input->post('btn_action') == 'Filter') 
		{
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('mode_of_payment')."'><i class='fa fa-plus'></i> Reset Search</a>";
			
			$by = $this->input->post('LoanProgramId');
			
			$this->db->where('LoanProgramId', $by);
			
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('LoanProgramId,mode_of_payment');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('mode_of_payment/new')."'><i class='fa fa-plus'></i> New Mode of Payment</a>";		
		$this->data['mode_of_payments'] = $this->mode_of_payments->get_mode_of_payments();
		$this->data['loan_programs'] = $this->mode_of_payments->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/mode_of_payment/index');

	}	

	
	public function view($id = NULL)
	{
		$this->data['view_only'] = TRUE;

		// Fetch a mode_of_payment or create a new mode_of_payment
		if ($id) 
		{
			$this->data['mode_of_payment'] = $this->mode_of_payments->get($id);
			
			if(!count($this->data['mode_of_payment'])) {
					$this->session->set_flashdata('error', 'Mode of Payment could not be found');
				redirect('mode_of_payments', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Mode of Payment - ' . $this->data['mode_of_payment']->mode_of_payment;
			$this->user_activities->write($this->data['page_title']);
		}
		
		$this->data['loan_programs'] = $this->mode_of_payments->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/mode_of_payment/view');
	}

	


	public function edit($id = NULL)
	{


		// Fetch a mode_of_payment or create a new mode_of_payment
		if ($id) 
		{
			$this->data['mode_of_payment'] = $this->mode_of_payments->get($id);
			if(!count($this->data['member'])) {
					$this->session->set_flashdata('error', 'Mode of Payment could not be found');
				redirect('members', 'refresh');
			}
			$this->data['page_title'] = 'Editing Mode of Payment - ' . $this->data['mode_of_payment']->mode_of_payment;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Mode of Payment';
			$this->data['mode_of_payment'] = $this->mode_of_payments->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->mode_of_payments->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->mode_of_payments->array_from_post(array(
				'LoanProgramId', 
				'mode_of_payment',
				'remarks',
				)
			);

			
			
			$this->mode_of_payments->save($data, $id);
			$message = "Mode of Payment " . $data['mode_of_payment'] . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to mode_of_payment
			redirect(site_url('mode_of_payment/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		$this->data['loan_programs'] = $this->mode_of_payments->get_loan_programs();
		
		// Load the view
		$this->load_view('admin/mode_of_payment/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$mode_of_payment = $this->mode_of_payments->get($id, TRUE);
		if(!count($mode_of_payment)) {
				$this->session->set_flashdata('error', 'Mode of Payment could not be found');
			redirect('mode_of_payments', 'refresh');
		}
		// process delete
		$this->mode_of_payments->delete($id);

		$message = "Mode of Payment " . $data['mode_of_payment'] . " has been successfully removed.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('mode_of_payment'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('mode_of_payment',$this->input->post('mode_of_payment'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('mode_of_payment_id !=', $id);

		$mode_of_payments = $this->mode_of_payments->get();

		if (count($mode_of_payments)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */