<?php 
/**
* Filename: member_loan_profiles.php
* Author: Junard De Leon (PHP Developer)
*/
class Member_Loan_Profiles extends MY_Model
{
    protected $table_name = "member_loan_profiles";
    protected $primary_key = "MemberId";   
    protected $order_by = "member_loan_profile_id.created_at DESC";
    protected $timestamps = FALSE;

    public $rules = array(
        'MemberId' => array('field' => 'MemberId', 'label' => 'Membr', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'LoanCategoryId' => array('field' => 'LoanCategoryId', 'label' => 'Loan Category', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'min_loanable_amount' => ['field' => 'min_loanable_amount', 'label' => 'Minimun Loanable Amount', 'rules' => 'trim|required|to_decimal|decimal|xss_clean'],
        'max_loanable_amount' => ['field' => 'max_loanable_amount', 'label' => 'Maximun Loanable Amount', 'rules' => 'trim|required|to_decimal|decimal|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $member_loan_profile = new stdClass();
        $member_loan_profile->MemberId = '';
        $member_loan_profile->LoanProgramId = '';
        $member_loan_profile->LoanCategoryId = '';
        $member_loan_profile->min_loanable_amount = '';
        $member_loan_profile->max_loanable_amount = '';
        return $member_loan_profile;
    }




    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/accounting_particular.php*/
 ?>