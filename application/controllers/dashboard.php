<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
		$this->load->model('members');
		$this->load->model('member_loans');
		$this->data['site_title'] = 'Dashboard';
		$this->data['page_title'] = 'Dashboard';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		
	}

	public function index()
	{
		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->db->where('finalized_by >', 0);
		
		if(config_item('accounting_group_id') == $this->session->userdata('user_group_id'))
		{
			$this->db->where('verified_by', 0);
			$this->db->where('disapproved_by', 0);
			$this->db->where('handled_by', 0);
		}
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['for_verification'] = count($this->member_loans->get_loans());

		$this->db->where('finalized_by >', 0);
		$this->db->where('verified_by', 0);
		$this->db->where('disapproved_by', 0);
		$this->db->where('handled_by', $this->session->userdata('user_id'));
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['my_queue'] = count($this->member_loans->get_loans());

		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));
		$this->db->where('finalized_by >', 0);
		if(config_item('accounting_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where('verified_by', $this->session->userdata('user_id'));
		elseif(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where('verified_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['approved_loans'] = count($this->member_loans->get_loans());

		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->db->where('finalized_by >', 0);
		if(config_item('accounting_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where('disapproved_by', $this->session->userdata('user_id'));
		elseif(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where('disapproved_by >',0);	
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->data['disapproved_loans'] = count($this->member_loans->get_loans());

		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->db->order_by('members.created_at desc');
		$this->db->limit(5);
		$this->data['members'] = $this->members->get_members();

		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->data['no_of_members'] = count($this->members->get_members());

		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		$this->db->where_in('AreaId', $this->session->userdata('data_access'));		
		$this->db->where('finalized_by >', 0);
		$this->db->where('LoanProgramId', config_item('p3_program_id'));
		$this->db->order_by('date_of_filing desc');
		$this->db->limit(5);
		$this->data['member_loans'] = $this->member_loans->get_loans();


		$this->data['alerts_sidebar'] = TRUE;


		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
			$this->load_view('admin/dashboard/teller');
		elseif(config_item('accounting_group_id') == $this->session->userdata('user_group_id'))
			$this->load_view('admin/dashboard/accounting');
		else
			$this->load_view('admin/dashboard/index');
	}

	


	public function view_profile()
	{
		$id = $this->session->userdata('user_id');	

		$this->data['view_only'] = TRUE;
		
		if ($id) 
		{
			$this->data['user'] = $this->users->get($id);
			$this->data['page_title'] = 'User Profile - ' . $this->data['user']->lastname . ', ' . $this->data['user']->firstname;
			if(!count($this->data['user'])) {
				$this->session->set_flashdata('error', 'User could not be found');
				redirect('dashboard', 'refresh');
			}

			
		}
		
		$this->data['areas'] = $this->users->get_areas();
		$this->data['groups'] = $this->users->get_groups();

		$data_access = explode(',', $this->data['user']->data_access);
		$this->db->where_in('area_id',$data_access);
		$this->data['data_access'] = $this->users->get_areas();
		
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/dashboard/view');
	}

	public function reset_password($id = NULL)
	{
		$id = $this->session->userdata('user_id');	
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
			redirect(site_url('dashboard/reset_password'));
		}
		$this->data['alerts_sidebar'] = TRUE;
		$this->load_view('admin/dashboard/reset_password');
	}

	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
