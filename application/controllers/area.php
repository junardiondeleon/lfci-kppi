<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Areas';
		$this->data['page_title'] = 'Areas';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('areas');
	}

	public function index()
	{
		

		// Set up pagination 
		$config['total_rows'] = $this->areas->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('area')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "area_code") 
			{
				$this->db->like('area_code', $q, 'after');
			}
			elseif ($by == "area_name") 
			{
				$this->db->like('area_name', $q, 'after');
			}
			unset($this->data['pagination']);
			$this->user_activities->write('Search Areas');
		}


		// Fecth all project
		$this->db->order_by('area_name');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('area/new')."'><i class='fa fa-plus'></i> New Area</a>";		
		$this->data['areas'] = $this->areas->get();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/area/index');

	}		

	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a group or create a new group
		if ($id) 
		{
			$this->data['area'] = $this->areas->get($id);
			if(!count($this->data['area'])) {
					$this->session->set_flashdata('error', 'Account Title could not be found');
				redirect('areas', 'refresh');
			}
			
			
			$this->data['page_title'] = 'Viewing Area - ' . $this->data['area']->area_name;
			$this->user_activities->write($this->data['page_title']);
			
		}
		

		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/area/view');
	}
	
	public function edit($id = NULL)
	{


		// Fetch a area or create a new area
		if ($id) 
		{
			$this->data['area'] = $this->areas->get($id);
			if(!count($this->data['area'])) {
					$this->session->set_flashdata('error', 'Account Title could not be found');
				redirect('areas', 'refresh');
			}
			$this->data['page_title'] = 'Editing Area ' . $this->data['area']->area_name;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['area'] = $this->areas->get_new();
			$this->data['page_title'] = 'New Area';
			$this->user_activities->write('Creating ' . $this->data['page_title']);
			
		}

		// Set up the form
		$rules = $this->areas->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->areas->array_from_post(array(
				'area_name', 
				'area_code', 
				'street_no',
				'barangay',
				'municipality',
				'province',
				'remarks',
				)
			);

			
			
			$this->areas->save($data, $id);
			$message = "Area " . $data['accounting_particular_name'] . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to area
			redirect(site_url('area/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		

		// Load the view
		$this->load_view('admin/area/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$area = $this->areas->get($id, TRUE);
		if(!count($area)) {
				$this->session->set_flashdata('error', 'Account Title could not be found');
			redirect('accounting_particulars', 'refresh');
		}


		// process delete
		$this->areas->delete($id);

		$message = "Area " . $area->area_name . " has been removed successfully.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('areas'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('area_name',$this->input->post('area_name'));
		!$id || $this->db->where('area_id !=', $id);

		$areas = $this->areas->get();

		if (count($areas)) 
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
		
		$this->db->where('area_code',$this->input->post('area_code'));
		!$id || $this->db->where('area_id !=', $id);

		$areas = $this->areas->get();

		if (count($areas)) 
		{
			$this->form_validation->set_message('_unique_code', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */