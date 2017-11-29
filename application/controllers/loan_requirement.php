<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_Requirement extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Loan Requirements';
		$this->data['page_title'] = 'Loan Requirements';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('loan_requirements');
	}

	public function index()
	{
		

		// Set up pagination 
		$config['total_rows'] = count($this->loan_requirements->get_loan_requirements());
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
			
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_requirement')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			$filter = $this->input->post('LoanProgramId');
			
			if ($filter != 0) 
			{
				$this->db->where('LoanProgramId', $filter);	
			}
			
			
		}

		
		// Fecth all project
		$this->db->order_by('LoanProgramId,loan_requirement');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('loan_requirement/new')."'><i class='fa fa-plus'></i> New Loan Requirement</a>";		
		$this->data['loan_requirements'] = $this->loan_requirements->get_loan_requirements();
		
		$this->data['loan_programs'] = $this->loan_requirements->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/loan_requirement/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a loan_requirement or create a new loan_requirement
		if ($id) 
		{
			$this->data['loan_requirement'] = $this->loan_requirements->get($id);
			if(!count($this->data['loan_requirement'])) {
					$this->session->set_flashdata('error', 'Loan Requirement could not be found');
				redirect('loan_requirements', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Loan Requirement - ' . $this->data['loan_requirement']->loan_requirement;
			
		}
		
		$this->data['loan_programs'] = $this->loan_requirements->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/loan_requirement/view');
	}

	


	public function edit($id = NULL)
	{


		// Fetch a loan_requirement or create a new loan_requirement
		if ($id) 
		{
			$this->data['loan_requirement'] = $this->loan_requirements->get($id);
			if(!count($this->data['loan_requirement'])) {
					$this->session->set_flashdata('error', 'Loan Requirement could not be found');
				redirect('loan_requirements', 'refresh');
			}
			$this->data['page_title'] = 'Editing Loan Requirement - ' . $this->data['loan_requirement']->loan_requirement;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Loan Requirement';
			$this->data['loan_requirement'] = $this->loan_requirements->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->loan_requirements->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->loan_requirements->array_from_post(array(
				'LoanProgramId', 
				'loan_requirement', 
				'remarks',
				)
			);

			
			
			$this->loan_requirements->save($data, $id);
			$message = "Loan Requirement " . $data['loan_requirement'] . " has been successfully saved.";
			$this->user_activities->write($message);
			// redirect to loan_requirement
			redirect(site_url('loan_requirement/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		$this->data['loan_programs'] = $this->loan_requirements->get_loan_programs();
		
		// Load the view
		$this->load_view('admin/loan_requirement/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$loan_requirement = $this->loan_requirements->get($id, TRUE);
		if(!count($loan_requirement)) {
				$this->session->set_flashdata('error', 'Loan Requirement could not be found');
			redirect('loan_requirements', 'refresh');
		}
		// process delete
		$this->loan_requirements->delete($id);

		$message = "Loan Requirement " . $loan_requirement->loan_requirement . " has been removed successfully.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('loan_requirement'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('loan_requirement',$this->input->post('loan_requirement'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('loan_requirement_id !=', $id);

		$loan_requirements = $this->loan_requirements->get();

		if (count($loan_requirements)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */