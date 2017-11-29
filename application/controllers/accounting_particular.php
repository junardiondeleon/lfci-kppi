<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounting_Particular extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();	
		if(config_item('accounting_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}

		$this->data['site_title'] = 'Account Titles';
		$this->data['page_title'] = 'Account Titles';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('accounting_particulars');
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
		$config['total_rows'] = $this->accounting_particulars->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('accounting_particular')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "accounting_particular_code") 
			{
				$this->db->like('accounting_particular_code', $q, 'after');
			}
			elseif ($by == "accounting_particular_name") 
			{
				$this->db->like('accounting_particular_name', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('accounting_particular_name');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('accounting_particular/new')."'><i class='fa fa-plus'></i> New Account Title</a>";		
		$this->data['accounting_particulars'] = $this->accounting_particulars->get();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/accounting_particular/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a accounting_particular or create a new accounting_particular
		if ($id) 
		{
			$this->data['accounting_particular'] = $this->accounting_particulars->get($id);
			if(!count($this->data['accounting_particular'])) {
					$this->session->set_flashdata('error', 'Account Title could not be found');
				redirect('accounting_particulars', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Account TitLe - ' . $this->data['accounting_particular']->accounting_particular_name;
			$this->user_activities->write($this->data['page_title']);
		}
		
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/accounting_particular/view');
	}

	public function edit($id = NULL)
	{


		// Fetch a accounting_particular or create a new accounting_particular
		if ($id) 
		{
			$this->data['accounting_particular'] = $this->accounting_particulars->get($id);
			if(!count($this->data['accounting_particular'])) {
					$this->session->set_flashdata('error', 'Account Title could not be found');
				redirect('accounting_particulars', 'refresh');
			}
			$this->data['page_title'] = 'Editing Account TitLe - ' . $this->data['accounting_particular']->accounting_particular_name;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['accounting_particular'] = $this->accounting_particulars->get_new();
			$this->data['page_title'] = 'New Account TitLe';
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->accounting_particulars->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			

			$data = $this->accounting_particulars->array_from_post(array(
				'accounting_particular_name', 
				'accounting_particular_code', 
				'accounting_particular_type',
				'remarks',
				)
			);

			
			
			$this->accounting_particulars->save($data, $id);

			$message = "Account Title " . $data['accounting_particular_name'] . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to accounting_particular
			redirect(site_url('accounting_particular/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;

		
		// Load the view
		$this->load_view('admin/accounting_particular/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$accounting_particular = $this->accounting_particulars->get($id, TRUE);
		if(!count($accounting_particular)) {
				$this->session->set_flashdata('error', 'Account Title could not be found');
			redirect('accounting_particulars', 'refresh');
		}
		// process delete
		$this->accounting_particulars->delete($id);

		$message = "Account Title " . $accounting_particular->accounting_particular_name . " has been removed successfully.";
		$this->user_activities->write($message);
		// redirect to project
		redirect(site_url('accounting_particular'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('accounting_particular_name',$this->input->post('accounting_particular_name'));
		!$id || $this->db->where('accounting_particular_id !=', $id);

		$accounting_particulars = $this->accounting_particulars->get();

		if (count($accounting_particulars)) 
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
		
		$this->db->where('accounting_particular_code',$this->input->post('accounting_particular_code'));
		!$id || $this->db->where('accounting_particular_id !=', $id);

		$accounting_particulars = $this->accounting_particulars->get();

		if (count($accounting_particulars)) 
		{
			$this->form_validation->set_message('_unique_code', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */