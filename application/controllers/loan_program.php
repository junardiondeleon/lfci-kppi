<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_Program extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Loan Programs';
		$this->data['page_title'] = 'Loan Programs';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('loan_programs');
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
		$config['total_rows'] = $this->loan_programs->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_program')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "loan_program_code") 
			{
				$this->db->like('loan_program_code', $q, 'after');
			}
			elseif ($by == "loan_program_name") 
			{
				$this->db->like('loan_program_name', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('loan_program_name');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('loan_program/new')."'><i class='fa fa-plus'></i> New Loan Program</a>";		
		$this->data['loan_programs'] = $this->loan_programs->get();
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/loan_program/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a loan_program or create a new loan_program
		if ($id) 
		{
			$this->data['loan_program'] = $this->loan_programs->get($id);
			if(!count($this->data['life_insurance'])) {
					$this->session->set_flashdata('error', 'Loan Program could not be found');
				redirect('loan_programs', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Loan Program - ' . $this->data['loan_program']->loan_program_name;
			$this->user_activities->write($this->data['page_title']);
		}
		

		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/loan_program/view');
	}

	public function edit($id = NULL)
	{


		// Fetch a loan_program or create a new loan_program
		if ($id) 
		{
			$this->data['loan_program'] = $this->loan_programs->get($id);
			
			if(!count($this->data['life_insurance'])) {
					$this->session->set_flashdata('error', 'Loan Program could not be found');
				redirect('loan_programs', 'refresh');
			}
			$this->data['page_title'] = 'Editing Loan Program - ' . $this->data['loan_program']->loan_program_name;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Loan Program';
			$this->data['loan_program'] = $this->loan_programs->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->loan_programs->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			$_POST['created_by'] = 1;

			$data = $this->loan_programs->array_from_post(array(
				'loan_program_name', 
				'loan_program_code', 
				'loan_program_description',
				'remarks',
				'created_by'
				)
			);

			
			
			$this->loan_programs->save($data, $id);
			$message = "Loan Program " . $data['loan_program_name'] . " has been successfully saved.";
			$this->user_activities->write($message);
			// redirect to loan_program
			redirect(site_url('loan_program/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;

		
		// Load the view
		$this->load_view('admin/loan_program/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$loan_program = $this->loan_programs->get($id, TRUE);
		if(!count($loan_program)) {
				$this->session->set_flashdata('error', 'Loan Program could not be found');
			redirect('loan_programs', 'refresh');
		}
		// process delete
		$this->loan_programs->delete($id);

		$message = "Loan Program " . $loan_program->loan_program_name . " has been removed successfully.";
		$this->user_activities->write($message);


		// redirect to project
		redirect(site_url('loan_program'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('loan_program_name',$this->input->post('loan_program_name'));
		!$id || $this->db->where('loan_program_id !=', $id);

		$loan_programs = $this->loan_programs->get();

		if (count($loan_programs)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	public function _unique_code($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('loan_program_code',$this->input->post('loan_program_code'));
		!$id || $this->db->where('loan_program_id !=', $id);

		$loan_programs = $this->loan_programs->get();

		if (count($loan_programs)) 
		{
			$this->form_validation->set_message('_unique_code', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */