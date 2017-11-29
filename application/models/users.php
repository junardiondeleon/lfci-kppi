<?php
/**
* Filename: users.php
* Author: Brando Talaguit (ITC Developer)
*/
class Users extends MY_Model
{
	protected $table_name = "users";
	public $primary_key = "user_id";
	protected $order_by = "lastname,firstname";
	
	public $rules = array(
		'username' => array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required|xss_clean'),
		'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required')
	);

	public $rules_reset_password = array(
		'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|min_length[8]|max_length[20]|matches[confirm_password]'),
		'confirm_password' => array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'trim|matches[password]'),
	);

	public $rules_admin = array(
		'lastname' => array('field' => 'lastname', 'label' => 'Lastname', 'rules' => 'trim|required|xss_clean'),
		'firstname' => array('field' => 'lastname', 'label' => 'Firstname', 'rules' => 'trim|required|xss_clean'),
		'middlename' => array('field' => 'middlename', 'label' => 'Middlename', 'rules' => 'trim|required|xss_clean'),
		'username' => array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required|min_length[8]|max_length[20]|alpha_dash|callback__unique_username|xss_clean'),
		'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|min_length[8]|max_length[20]|matches[confirm_password]'),
		'confirm_password' => array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'trim|matches[password]'),
		'email_address' => array('field' => 'email_address', 'label' => 'Email Address', 'rules' => 'trim|required|valid_email|xss_clean'),
		'AreaId' => array('field' => 'AreaId', 'label' => 'Area', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'GroupId' => array('field' => 'GroupId', 'label' => 'User Group', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'data_access' => array('field' => 'data_access', 'label' => 'Data Access', 'rules' => 'trim|required|xss_clean'),
		'street_no' => array('field' => 'street_no', 'label' => 'Street No', 'rules' => 'trim|required|xss_clean'),
		'barangay' => array('field' => 'barangay', 'label' => 'Barangay', 'rules' => 'trim|required|xss_clean'),
		'municipality' => array('field' => 'municipality', 'label' => 'Municipality', 'rules' => 'trim|required|xss_clean'),
		'province' => array('field' => 'province', 'label' => 'Province', 'rules' => 'trim|required|xss_clean'),
		'age' => array('field' => 'age', 'label' => 'Age', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'birthday' => array('field' => 'birthday', 'label' => 'Birthday', 'rules' => 'trim|required|date|xss_clean'),
		'gender' => array('field' => 'gender', 'label' => 'Gender', 'rules' => 'trim|required|xss_clean'),
		'civil_status' => array('field' => 'civil_status', 'label' => 'Civil Status', 'rules' => 'trim|required|xss_clean'),
		'telephone_no' => array('field' => 'telephone_no', 'label' => 'Telephone no', 'rules' => 'trim|max_length[20]|xss_clean'),
		'mobile_no' => array('field' => 'mobile_no', 'label' => 'Mobile No', 'rules' => 'trim|required|max_length[20]|xss_clean'),
		'data_access[]' => array('field' => 'data_access[]', 'label' => 'Data Access', 'rules' => 'trim|required|xss_clean'),

	);

	public $rules_admin_wout_password = array(
		'lastname' => array('field' => 'lastname', 'label' => 'Lastname', 'rules' => 'trim|required|xss_clean'),
		'firstname' => array('field' => 'lastname', 'label' => 'Firstname', 'rules' => 'trim|required|xss_clean'),
		'middlename' => array('field' => 'middlename', 'label' => 'Middlename', 'rules' => 'trim|required|xss_clean'),
		'username' => array('field' => 'username', 'label' => 'Username', 'rules' => 'trim|required|min_length[8]|max_length[20]|alpha_dash|callback__unique_username|xss_clean'),
		'email_address' => array('field' => 'email_address', 'label' => 'Email Address', 'rules' => 'trim|required|valid_email|xss_clean'),
		'AreaId' => array('field' => 'AreaId', 'label' => 'Area', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'GroupId' => array('field' => 'GroupId', 'label' => 'User Group', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'street_no' => array('field' => 'street_no', 'label' => 'Street No', 'rules' => 'trim|required|xss_clean'),
		'barangay' => array('field' => 'barangay', 'label' => 'Barangay', 'rules' => 'trim|required|xss_clean'),
		'municipality' => array('field' => 'municipality', 'label' => 'Municipality', 'rules' => 'trim|required|xss_clean'),
		'province' => array('field' => 'province', 'label' => 'Province', 'rules' => 'trim|required|xss_clean'),
		'age' => array('field' => 'age', 'label' => 'Age', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'birthday' => array('field' => 'birthday', 'label' => 'Birthday', 'rules' => 'trim|required|date|xss_clean'),
		'gender' => array('field' => 'gender', 'label' => 'Gender', 'rules' => 'trim|required|xss_clean'),
		'civil_status' => array('field' => 'civil_status', 'label' => 'Civil Status', 'rules' => 'trim|required|xss_clean'),
		'telephone_no' => array('field' => 'telephone_no', 'label' => 'Telephone no', 'rules' => 'trim|max_length[20]|xss_clean'),
		'mobile_no' => array('field' => 'mobile_no', 'label' => 'Mobile No', 'rules' => 'trim|required|max_length[20]|xss_clean'),
		'data_access[]' => array('field' => 'data_access[]', 'label' => 'Data Access', 'rules' => 'trim|required|xss_clean'),
		

	);

	function __construct()
	{
		parent::__construct();
	}


	public function login()
	{
		$this->db->select('lastname, firstname, middlename, username, user_id, area_name, GroupId, AreaId, birthday, email_address, gender, group_code, group_name, data_access');
		$this->db->join('groups as b', 'b.group_id = users.GroupId', 'left');
		$this->db->join('areas as c', 'c.area_id = users.AreaId', 'left');
		$user =	$this->get_by(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash($this->input->post('password'))
		), TRUE);



		if (count($user))
		{
			# Log in user

			$data_access = explode(',', $user->data_access);

			$data = array(
				'lastname' => $user->lastname,
				'firstname' => $user->firstname,
				'middlename' => $user->middlename,
				'username' => $user->username,
				'user_id' => $user->user_id,
				'email_address' => $user->email_address,
				'birthday' => $user->birthday,
				'gender' => $user->gender,
				'area_id' => $user->AreaId,
				'area_name' => $user->area_name,
				'user_group_id' => $user->GroupId,
				'user_group_name' => $user->group_name,
				'data_access' => $data_access,
				'logged_in' => TRUE
			);

			$this->session->set_userdata($data);
			return TRUE;
		}

		// If we get to here then login did not succeed
		return FALSE;
	}

	public function get_users($id = NULL, $single = FALSE)
    {
        // Fetch users
        $this->db->select('user_id, lastname, firstname, area_name, group_name');
        $this->db->join('groups as b', 'b.group_id = users.GroupId', 'left');
        $this->db->join('areas as c', 'c.area_id = users.AreaId', 'left');
        
        return parent::get($id, $single);
    }

	public function get_areas()
    {
        // Fetch areas
        $this->db->select('area_id, area_code, area_name');
        $areas = $this->db->order_by('area_code, area_name')->get('areas')->result();
         
        // Return key -> value pair array 
        if (count($areas)) 
        {
            foreach ($areas as $area) 
            $array[$area->area_id] =   $area->area_name;
        }

        return $array;
    }

    public function get_groups()
    {
        // Fetch groups
        $this->db->select('group_id, group_code, group_name');
        $groups = $this->db->order_by('group_code, group_name')->get('groups')->result();
         
        // Return key -> value pair array
         $array = array('' => '');
        if (count($groups)) 
        {
            foreach ($groups as $group) 
            $array[$group->group_id] =   $group->group_name;
        }

        return $array;
    }


	public function update_last_logged_in()
	{
		return (bool) $this->session->userdata('logged_in');
	}

	public function logged_in()
	{
		return (bool) $this->session->userdata('logged_in');
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function get_new()
	{
		$user = new stdClass();
		$user->GroupId = 0;
		$user->username = '';
		$user->password = '';
		$user->confirm_password = '';
		$user->email_address = '';
		$user->lastname = '';
		$user->firstname = '';
		$user->middlename = '';
		$user->AreaId = 0;
		$user->street_no = '';
		$user->barangay = '';
		$user->municipality = '';
		$user->province = '';
		$user->age = '';
		$user->birthday = '';
		$user->gender = '';
		$user->civil_status = '';
		$user->telephone_no = '';
		$user->mobile_no = '';
		return $user;
	}

	public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}

/*Location: ./application/models/users.php*/
 ?>
