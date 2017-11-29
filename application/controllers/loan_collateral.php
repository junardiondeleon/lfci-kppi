<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_Collateral extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Loan Collaterals';
		$this->data['page_title'] = 'Loan Collaterals';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('loan_collaterals');
	}

	public function index()
	{
		

		// Set up pagination 
		$config['total_rows'] = count($this->loan_collaterals->get_loan_collaterals());
		$config['per_page'] = 10;
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
			
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_collateral')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			$filter = $this->input->post('LoanProgramId');
			
			if ($filter != 0) 
			{
				$this->db->where('LoanProgramId', $filter);	
			}
			
			
		}

		
		// Fecth all project
		$this->db->order_by('LoanProgramId,loan_collateral');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('loan_collateral/new')."'><i class='fa fa-plus'></i> New Loan Collateral</a>";		
		$this->data['loan_collaterals'] = $this->loan_collaterals->get_loan_collaterals();
		
		$this->data['loan_programs'] = $this->loan_collaterals->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/loan_collateral/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a loan_collateral or create a new loan_collateral
		if ($id) 
		{
			$this->data['loan_collateral'] = $this->loan_collaterals->get($id);
			if(!count($this->data['loan_collateral'])) {
					$this->session->set_flashdata('error', 'Loan Collateral could not be found');
				redirect('loan_collaterals', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Loan Collateral - ' . $this->data['loan_collateral']->loan_collateral;
			
		}
		
		$this->data['loan_programs'] = $this->loan_collaterals->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/loan_collateral/view');
	}

	


	public function edit($id = NULL)
	{


		// Fetch a loan_collateral or create a new loan_collateral
		if ($id) 
		{
			$this->data['loan_collateral'] = $this->loan_collaterals->get($id);
			if(!count($this->data['loan_collateral'])) {
					$this->session->set_flashdata('error', 'Loan Collateral could not be found');
				redirect('loan_collaterals', 'refresh');
			}
			$this->data['page_title'] = 'Editing Loan Collateral - ' . $this->data['loan_collateral']->loan_collateral;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Loan Collateral';
			$this->data['loan_collateral'] = $this->loan_collaterals->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->loan_collaterals->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->loan_collaterals->array_from_post(array(
				'LoanProgramId', 
				'loan_collateral', 
				'remarks',
				)
			);

			
			
			$this->loan_collaterals->save($data, $id);
			$message = "Loan Collateral " . $data['loan_collateral'] . " has been successfully saved.";
			$this->user_activities->write($message);
			// redirect to loan_collateral
			redirect(site_url('loan_collateral/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		$this->data['loan_programs'] = $this->loan_collaterals->get_loan_programs();
		
		// Load the view
		$this->load_view('admin/loan_collateral/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$loan_collateral = $this->loan_collaterals->get($id, TRUE);
		if(!count($loan_collateral)) {
				$this->session->set_flashdata('error', 'Loan Collateral could not be found');
			redirect('loan_collaterals', 'refresh');
		}
		// process delete
		$this->loan_collaterals->delete($id);

		$message = "Loan Collateral " . $loan_collateral->loan_collateral . " has been removed successfully.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('loan_collateral'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('loan_collateral',$this->input->post('loan_collateral'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('loan_collateral_id !=', $id);

		$loan_collaterals = $this->loan_collaterals->get();

		if (count($loan_collaterals)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */