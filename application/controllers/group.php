<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		

		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}

		$this->data['site_title'] = 'User Groups';
		$this->data['page_title'] = 'User Groups';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('groups');
	}

	public function index()
	{
		


		// Set up pagination 
		$config['total_rows'] = $this->groups->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('group')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "group_code") 
			{
				$this->db->like('group_code', $q, 'after');
			}
			elseif ($by == "group_name") 
			{
				$this->db->like('group_name', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('group_name');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('group/new')."'><i class='fa fa-plus'></i> New User Group</a>";		
		$this->data['groups'] = $this->groups->get();
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/group/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a group or create a new group
		if ($id) 
		{
			$this->data['group'] = $this->groups->get($id);
			if(!count($this->data['group'])) {
					$this->session->set_flashdata('error', 'User Group could not be found');
				redirect('areas', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Group - ' . $this->data['group']->group_name;
			$this->user_activities->write($this->data['page_title']);
		}
		

		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/group/view');
	}

	public function edit($id = NULL)
	{


		// Fetch a group or create a new group
		if ($id) 
		{
			$this->data['group'] = $this->groups->get($id);
			if(!count($this->data['group'])) {
					$this->session->set_flashdata('error', 'User Group could not be found');
				redirect('areas', 'refresh');
			}
			$this->data['page_title'] = 'Editing Group - ' . $this->data['group']->group_name;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['group'] = $this->groups->get_new();
			$this->data['page_title'] = 'New Group';
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->groups->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{



			$data = $this->groups->array_from_post(array(
				'group_name', 
				'group_code', 
				
				'remarks',
				)
			);

					
			$this->groups->save($data, $id);

			$message = "User Group " . $data['group_name'] . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to group
			redirect(site_url('group/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;

		
		// Load the view
		$this->load_view('admin/group/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$group = $this->groups->get($id, TRUE);

		if(!count($group)) {
					$this->session->set_flashdata('error', 'User Group could not be found');
				redirect('groups', 'refresh');
			}
		// process delete
		$this->groups->delete($id);

		$message = "User Group " . $group->group_name . " has been removed successfully.";
		$this->user_activities->write($message);


		// redirect to project
		redirect(site_url('group'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('group_name',$this->input->post('group_name'));
		!$id || $this->db->where('group_id !=', $id);

		$groups = $this->groups->get();

		if (count($groups)) 
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
		
		$this->db->where('group_code',$this->input->post('group_code'));
		!$id || $this->db->where('group_id !=', $id);

		$groups = $this->groups->get();

		if (count($groups)) 
		{
			$this->form_validation->set_message('_unique_code', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */