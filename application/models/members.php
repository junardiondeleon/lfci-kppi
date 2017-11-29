<?php
/**
* Filename: members.php
* Author: Brando Talaguit (ITC Developer)
*/
class Members extends MY_Model
{
	protected $table_name = "members";
	public $primary_key = "member_id";
	protected $order_by = "lastname,firstname";
	
	

	public $rules = array(
		'lastname' => array('field' => 'lastname', 'label' => 'Lastname', 'rules' => 'trim|required|xss_clean'),
		'firstname' => array('field' => 'lastname', 'label' => 'Firstname', 'rules' => 'trim|required|xss_clean'),
		'middlename' => array('field' => 'middlename', 'label' => 'Middlename', 'rules' => 'trim|required|xss_clean'),
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
		'spouse_lastname' => array('field' => 'spouse_lastname', 'label' => 'Spouse Lastname', 'rules' => 'trim|xss_clean'),
		'spouse_firstname' => array('field' => 'spouse_firstname', 'label' => 'Spouse Firstname', 'rules' => 'trim|xss_clean'),
		'spouse_middlename' => array('field' => 'spouse_middlename', 'label' => 'Spouse Middlename', 'rules' => 'trim|xss_clean'),
		'spouse_contact_no' => array('field' => 'spouse_contact_no', 'label' => 'Spouse Contact No', 'rules' => 'trim|xss_clean'),
		'business_type' => array('field' => 'business_type', 'label' => 'Business Type', 'rules' => 'trim|required|xss_clean'),
		'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'LoanCategoryId' => array('field' => 'LoanCategoryId', 'label' => 'Loan Category', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
		'min_loanable_amount' => ['field' => 'min_loanable_amount', 'label' => 'Minimun Loanable Amount', 'rules' => 'trim|required|to_decimal|decimal|xss_clean'],
        'max_loanable_amount' => ['field' => 'max_loanable_amount', 'label' => 'Maximun Loanable Amount', 'rules' => 'trim|required|to_decimal|decimal|xss_clean'],
	);

	function __construct()
	{
		parent::__construct();
	}


	public function get_member_with_loan_profile($id = NULL, $single = FALSE)
    {
        // Fetch members
        $this->db->select('members.*,c.*,b.area_name');
        $this->db->join('member_loan_profiles as c', 'c.MemberId = members.member_id', 'left');
        $this->db->join('areas as b', 'b.area_id = members.AreaId', 'left');
        return parent::get($id, $single);
    }
	

	public function get_members($id = NULL, $single = FALSE)
    {
        // Fetch members
        $this->db->select('member_id, lastname, firstname, mobile_no, area_name, business_type');
        $this->db->join('areas as c', 'c.area_id = members.AreaId', 'left');
        return parent::get($id, $single);
    }

	public function get_loan_categories()
    {
        // Fetch areas
        $this->db->select('loan_category_id, loan_category_code, loan_category_name');
        $loan_categories = $this->db->order_by('loan_category_code, loan_category_name')->get('loan_categories')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($loan_categories)) 
        {
            foreach ($loan_categories as $loan_category) 
            $array[$loan_category->loan_category_id] =   $loan_category->loan_category_name;
        }

        return $array;
    }

    public function get_loan_programs()
    {
        // Fetch areas
        $this->db->select('loan_program_id, loan_program_code, loan_program_name');
        $loan_programs = $this->db->order_by('loan_program_code, loan_program_name')->get('loan_programs')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($loan_programs)) 
        {
            foreach ($loan_programs as $loan_program) 
            $array[$loan_program->loan_program_id] =   $loan_program->loan_program_name;
        }

        return $array;
    }


	

	public function get_new()
	{
		$member = new stdClass();
		$member->lastname = '';
		$member->firstname = '';
		$member->middlename = '';
		$member->street_no = '';
		$member->barangay = '';
		$member->municipality = '';
		$member->province = '';
		$member->age = '';
		$member->birthday = '';
		$member->gender = '';
		$member->civil_status = '';
		$member->telephone_no = '';
		$member->mobile_no = '';
		$member->spouse_middlename = '';
		$member->spouse_firstname = '';
		$member->spouse_lastname = '';
		$member->spouse_contact_no = '';
		$member->business_type = '';
		$member->min_loanable_amount = '';
		$member->max_loanable_amount = '';
		$member->LoanCategoryId = '';
		$member->LoanProgramId = '';
		return $member;
	}

	public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

	
}

/*Location: ./application/models/members.php*/
 ?>
