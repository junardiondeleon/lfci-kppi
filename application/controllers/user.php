<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->load->model('users');
		$this->data['site_title'] = 'Users';
		$this->data['page_title'] = 'Users';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
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
		$config['total_rows'] = $this->users->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('users')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "name") 
			{
				$this->db->like('lastname', $q, 'after');
				$this->db->or_like('firstname', $q, 'after');
			}
			elseif ($by == "group_name") 
			{
				$this->db->like('group_name', $q, 'after');
			}
			elseif ($by == "area_name") 
			{
				$this->db->like('area_name', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('lastname');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('user/new')."'><i class='fa fa-plus'></i> New User</a>";		
		$this->data['users'] = $this->users->get_users();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/user/index');

	}	

	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a group or create a new group
		if ($id) 
		{
			$this->data['user'] = $this->users->get($id);
			$this->data['page_title'] = 'Viewing User - ' . $this->data['user']->lastname . ', ' . $this->data['user']->firstname;
			if(!count($this->data['user'])) {
				$this->session->set_flashdata('error', 'User could not be found');
			redirect('users', 'refresh');
			}

			$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		}
		
		$this->data['areas'] = $this->users->get_areas();
		$this->data['groups'] = $this->users->get_groups();

		$data_access = explode(',', $this->data['user']->data_access);
		$this->db->where_in('area_id',$data_access);
		$this->data['data_access'] = $this->users->get_areas();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/user/view');
	}	
	
	public function reset_password($id = NULL)
	{
		if ($id) 
		{
			
			$rules = $this->users->rules_reset_password;			
			$this->data['user'] = $this->users->get($id);
			$this->data['page_title'] = 'Reset Password - ' . $this->data['user']->lastname . ', ' . $this->data['user']->firstname ;
			if(!count($this->data['user'])) {
				$this->session->set_flashdata('error', 'User could not be found');
				redirect('users', 'refresh');
			}
			$this->user_activities->write($this->data['page_title']);
		}

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			
			$data = $this->users->array_from_post(array(
				'password', 
				)
			);

			if (!empty($data['password'])) 
			{
				// encrypt Password 
				$data['password'] = $this->users->hash($data['password']);
			}
			else
			{
				// We don't save an empty password
				unset($data['password']);
			}
			
			
			$this->users->save($data, $id);

			$message = "User " . $this->data['user']->lastname . ', ' . $this->data['user']->firstname  . " password has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to user
			redirect(site_url('user/index'));
		}
		$this->data['alerts_sidebar'] = TRUE;
		$this->load_view('admin/user/reset_password');
	}	


	public function edit($id = NULL)
	{
		$this->data['show_password_fields'] = TRUE;

		// Fetch a user or create a new user
		if ($id) 
		{
			$this->data['user'] = $this->users->get($id);
			if(!count($this->data['user'])) {
				$this->session->set_flashdata('error', 'User could not be found');
			redirect('users', 'refresh');
			}
			$this->data['show_password_fields'] = FALSE;
			$rules = $this->users->rules_admin_wout_password;			
			$this->data['page_title'] = 'Editing User - ' . $this->data['user']->lastname . ', ' . $this->data['user']->firstname ;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
		
			$rules = $this->users->rules_admin;			
			$this->data['page_title'] = 'New User';
			$this->data['user'] = $this->users->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}
		
		

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			
			$data = $this->users->array_from_post(array(
				'GroupId', 
				'AreaId', 
				'username', 
				'password', 
				'lastname',
				'firstname',
				'middlename',
				'email_address',
				'street_no',
				'barangay',
				'municipality',
				'province',
				'age',
				'birthday',
				'gender',
				'civil_status',
				'telephone_no',
				'mobile_no',
				'data_access',
				
				)
			);

			$data['data_access'] = implode(",", $_POST['data_access']);				

			if (!empty($data['password'])) 
			{
				// encrypt Password 
				$data['password'] = $this->users->hash($data['password']);
			}
			else
			{
				// We don't save an empty password
				unset($data['password']);
			}
			
			
			$this->users->save($data, $id);

			$message = "User " . $data['firstname'] . " " . $data['lastname']  . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to user
			redirect(site_url('user/index'));
		}

		$this->data['areas'] = $this->users->get_areas();
		$this->data['groups'] = $this->users->get_groups();
		$this->data['alerts_sidebar'] = FALSE;
		
		// Load the view
		$this->load_view('admin/user/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$user = $this->users->get($id, TRUE);
		if(!count($user)) {
			$this->session->set_flashdata('error', 'User could not be found');
		redirect('users', 'refresh');
		}
		// process delete
		$this->users->delete($id);

		$message = "User " . $user->firstname . " " . $user->lastname  . " has been successfully removed.";
		
		$this->user_activities->write($message);


		// redirect to project
		redirect(site_url('users'));
	}

	public function _unique_username($str)
	{
		// Do NOT validate if position already exists
		// UNLESS it's the name for the current position
		$id = $this->uri->segment(2);
		
		$this->db->where('username',$this->input->post('username'));
		!$id || $this->db->where('user_id !=', $id);

		$user = $this->users->get();

		if (count($user)) 
		{
			$this->form_validation->set_message('_unique_username', "The username %s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
