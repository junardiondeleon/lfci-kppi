<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('members');
		$this->load->model('member_loan_profiles');
		$this->data['view_only'] = FALSE;
		$this->data['site_title'] = 'Members';
		$this->data['page_title'] = 'Members';
		$this->data['sub_page_title'] = '';
	}

	public function index()
	{
		
		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		{
			$this->db->where('AreaId', $this->session->userdata('area_id'));	
		}

		// Set up pagination 
		$config['total_rows'] = count($this->members->get_members());
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('members')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "lastname") 
			{
				$this->db->like('lastname', $q, 'after');
			}
			elseif($by == "firstname"){
				$this->db->like('firstname', $q, 'after');
			}
			
			unset($this->data['pagination']);
		}

		
		
		// Fecth all project
		$this->db->order_by('lastname');
		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		{
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('member/new')."'><i class='fa fa-plus'></i> New Member</a>";		
		}

		if(config_item('teller_group_id') == $this->session->userdata('user_group_id'))
		{
			$this->db->where('AreaId', $this->session->userdata('area_id'));	
		}
		
		$this->data['members'] = $this->members->get_members();

		
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/member/index');

	}	

	public function view($id = NULL)
	{
		$this->data['view_only'] = TRUE;

		// Fetch a group or create a new group
		if ($id) 
		{
			$this->data['member'] = $this->members->get_member_with_loan_profile($id);
			if(!count($this->data['member'])) {
					$this->session->set_flashdata('error', 'Member could not be found');
				redirect('members', 'refresh');
			}
			$this->data['page_title'] = 'Member Profile - ' . $this->data['member']->lastname . ', ' . $this->data['member']->firstname;
			$this->user_activities->write($this->data['page_title']);
		}
		
		$this->data['loan_programs'] = $this->members->get_loan_programs();
		$this->data['loan_categories'] = $this->members->get_loan_categories();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/member/view');
	}


	
	

	
	public function edit($id = NULL)
	{


		// Fetch a member or create a new member
		if ($id) 
		{
			$this->data['member'] = $this->members->get_member_with_loan_profile($id);
			
			if(!count($this->data['member'])) {
					$this->session->set_flashdata('error', 'Member could not be found');
				redirect('members', 'refresh');
			}
			$this->data['page_title'] = 'Editing Member - ' . $this->data['member']->lastname . ', ' . $this->data['member']->firstname ;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
	
			$this->data['page_title'] = 'New Member';
			$this->data['member'] = $this->members->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		$rules = $this->members->rules;			
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store member id
			
			$_POST['AreaId'] = $this->session->userdata('area_id');
			$data = $this->members->array_from_post(array(
				'AreaId', 
				'lastname',
				'firstname',
				'middlename',
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
				'spouse_lastname',
				'spouse_firstname',
				'spouse_middlename',
				'spouse_contact_no',
				'business_type',
				)
			);

			
			$_POST['MemberId'] = $this->members->save($data, $id);


			$data = $this->member_loan_profiles->array_from_post(array(
				'MemberId', 
				'LoanProgramId',
				'LoanCategoryId',
				'min_loanable_amount',
				'max_loanable_amount',
				)
			);

			$this->member_loan_profiles->save($data, $id);

			$message = "Member " . $data['firstname'] . " " . $data['lastname']  . " has been successfully saved.";
			$this->user_activities->write($message);

			// redirect to member
			redirect(site_url('member/index'));
		}

		$this->data['loan_programs'] = $this->members->get_loan_programs();
		$this->data['loan_categories'] = $this->members->get_loan_categories();
		$this->data['alerts_sidebar'] = FALSE;
		
		// Load the view
		$this->load_view('admin/member/edit');
	}

	

	public function delete($id = NULL)
	{
		// fetch data
		$member = $this->members->get($id, TRUE);
		if(!count($member)) {
				$this->session->set_flashdata('error', 'Member could not be found');
			redirect('members', 'refresh');
		}
		// process delete
		$this->members->delete($id);

		$message = "Member " . $member->firstname . " " . $member->lastname  . " has been successfully removed.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('members'));
	}

	public function _unique_membername($str)
	{
		// Do NOT validate if position already exists
		// UNLESS it's the name for the current position
		$id = $this->uri->segment(2);
		
		$this->db->where('membername',$this->input->post('membername'));
		!$id || $this->db->where('member_id !=', $id);

		$member = $this->members->get();

		if (count($member)) 
		{
			$this->form_validation->set_message('_unique_membername', "The membername %s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
