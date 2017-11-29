<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Life_Insurance extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		

		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}

		$this->data['site_title'] = 'Life Insurances';
		$this->data['page_title'] = 'Life Insurances';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('life_insurances');
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
		$config['total_rows'] = $this->life_insurances->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('life_insurance')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "life_insurance") 
			{
				$this->db->like('life_insurance', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		if ($this->input->post('btn_action') == 'Filter') 
		{
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('life_insurance')."'><i class='fa fa-plus'></i> Reset Search</a>";
			
			$by = $this->input->post('LoanProgramId');
			
			$this->db->where('LoanProgramId', $by);
			
			unset($this->data['pagination']);
		}

		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Fecth all project
		$this->db->order_by('LoanProgramId,life_insurance');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('life_insurance/new')."'><i class='fa fa-plus'></i> New Life Insurance</a>";		
		$this->data['life_insurances'] = $this->life_insurances->get_life_insurances();
		$this->data['loan_programs'] = $this->life_insurances->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/life_insurance/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a life_insurance or create a new life_insurance
		if ($id) 
		{
			$this->data['life_insurance'] = $this->life_insurances->get($id);
			if(!count($this->data['life_insurance'])) {
					$this->session->set_flashdata('error', 'Life Insurance could not be found');
				redirect('life_insurances', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Life Insurance - ' . $this->data['life_insurance']->life_insurance;
			
		}
		
		$this->data['loan_programs'] = $this->life_insurances->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/life_insurance/view');
	}

	


	public function edit($id = NULL)
	{


		// Fetch a life_insurance or create a new life_insurance
		if ($id) 
		{
			$this->data['life_insurance'] = $this->life_insurances->get($id);
			if(!count($this->data['life_insurance'])) {
					$this->session->set_flashdata('error', 'Life Insurance could not be found');
				redirect('life_insurances', 'refresh');
			}
			$this->data['page_title'] = 'Editing Life Insurance - ' . $this->data['life_insurance']->life_insurance;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Life Insurance';
			$this->data['life_insurance'] = $this->life_insurances->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->life_insurances->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->life_insurances->array_from_post(array(
				'LoanProgramId', 
				'life_insurance', 
				'amount',
				'remarks',
				)
			);

			
			
			$this->life_insurances->save($data, $id);
			$message = "Life Insurance " . $data['life_insurance'] . " has been successfully saved.";
			$this->user_activities->write($message);
			// redirect to life_insurance
			redirect(site_url('life_insurance/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		$this->data['loan_programs'] = $this->life_insurances->get_loan_programs();
		
		// Load the view
		$this->load_view('admin/life_insurance/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$life_insurance = $this->life_insurances->get($id, TRUE);
		if(!count($life_insurance)) {
				$this->session->set_flashdata('error', 'Life Insurance could not be found');
			redirect('life_insurances', 'refresh');
		}
		// process delete
		$this->life_insurances->delete($id);

		$message = "Life Insurance " . $life_insurance->life_insurance . " has been removed successfully.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('life_insurance'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('life_insurance',$this->input->post('life_insurance'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('life_insurance_id !=', $id);

		$life_insurances = $this->life_insurances->get();

		if (count($life_insurances)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */