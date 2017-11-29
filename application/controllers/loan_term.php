<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_Term extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Loan Terms';
		$this->data['page_title'] = 'Loan Terms';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('loan_terms');
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
		$config['total_rows'] = $this->loan_terms->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_term')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "loan_term_code") 
			{
				$this->db->like('loan_term_code', $q, 'after');
			}
			elseif ($by == "loan_term_name") 
			{
				$this->db->like('loan_term', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		if ($this->input->post('btn_action') == 'Filter') 
		{
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_term')."'><i class='fa fa-plus'></i> Reset Search</a>";
			
			$by = $this->input->post('LoanProgramId');
			
			$this->db->where('LoanProgramId', $by);
			
			unset($this->data['pagination']);
		}
		

		// Fecth all project
		$this->db->order_by('LoanProgramId,loan_term');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('loan_term/new')."'><i class='fa fa-plus'></i> New Loan Term</a>";		
		$this->data['loan_terms'] = $this->loan_terms->get_loan_terms();
		$this->data['loan_programs'] = $this->loan_terms->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/loan_term/index');

	}	

	
	public function view($id = NULL)
	{
		$this->data['view_only'] = TRUE;		
		// Fetch a loan_term or create a new loan_term
		if ($id) 
		{
			$this->data['loan_term'] = $this->loan_terms->get($id);
			
			if(!count($this->data['loan_term'])) {
					$this->session->set_flashdata('error', 'Loan Term could not be found');
				redirect('loan_terms', 'refresh');
			}	
			$this->data['page_title'] = 'Viewing Loan Term - ' . $this->data['loan_term']->loan_term;
			$this->user_activities->write($this->data['page_title']);
			
		}
		
		$this->data['loan_programs'] = $this->loan_terms->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/loan_term/view');
	}

	


	public function edit($id = NULL)
	{


		// Fetch a loan_term or create a new loan_term
		if ($id) 
		{
			$this->data['loan_term'] = $this->loan_terms->get($id);
			if(!count($this->data['loan_term'])) {
					$this->session->set_flashdata('error', 'Loan Term could not be found');
				redirect('loan_terms', 'refresh');
			}
			$this->data['page_title'] = 'Editing Loan Term - ' . $this->data['loan_term']->loan_term;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Loan Term';
			$this->data['loan_term'] = $this->loan_terms->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->loan_terms->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->loan_terms->array_from_post(array(
				'LoanProgramId', 
				'loan_term', 
				'loan_divisor',
				'interest',
				'remarks',
				)
			);
			
			$this->loan_terms->save($data, $id);

			$message = "Loan Term " . $data['loan_term'] . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to loan_term
			redirect(site_url('loan_term/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		$this->data['loan_programs'] = $this->loan_terms->get_loan_programs();
		
		// Load the view
		$this->load_view('admin/loan_term/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$loan_term = $this->loan_terms->get($id, TRUE);
		if(!count($loan_term)) {
			$this->session->set_flashdata('error', 'Loan Term could not be found');
			redirect('loan_terms', 'refresh');
		}	
		// process delete
		$this->loan_terms->delete($id);

		// // save log
		$message = "Loan Term " . $loan_term->loan_term . " has been removed successfully.";
	
		$this->user_activities->write($message);	
		// redirect to loan_terms
		redirect(site_url('loan_terms'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('loan_term',$this->input->post('loan_term'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('loan_term_id !=', $id);

		$loan_terms = $this->loan_terms->get();

		if (count($loan_terms)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */