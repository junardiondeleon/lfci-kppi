<?php 
/**
* Filename: loan_categories.php
* Author: Junard De Leon (PHP Developer)
*/
class Member_Loans extends MY_Model
{
    protected $table_name = "member_loans";
    protected $primary_key = "member_loan_id";   
    protected $order_by = "member_loan_id.created_at DESC";
    protected $timestamps = TRUE;

    public $no_rules = array(
        'btn_action' => array('field' => 'btn_action', 'label' => 'Action', 'rules' => 'trim|required|xss_clean'));

    public $rules = array(
        'MemberId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'date_of_filing' => array('field' => 'date_of_filing', 'label' => 'Filing Date', 'rules' => 'trim|required|date|xss_clean'),
        'name' => array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required|xss_clean'),
        'loan_requirements[]' => array('field' => 'loan_requirements[]', 'label' => 'Loan Requirements', 'rules' => 'trim|required|xss_clean'),
        'loan_collaterals[]' => array('field' => 'loan_collaterals[]', 'label' => 'Loan Collaterals', 'rules' => 'trim|required|xss_clean'),
        'loan_collateral_details' => array('field' => 'loan_collateral_details', 'label' => 'Loan Collateral Details', 'rules' => 'trim|required|nl2br|xss_clean'),

        'street_no' => array('field' => 'street_no', 'label' => 'Street No', 'rules' => 'trim|required|xss_clean'),
        'barangay' => array('field' => 'barangay', 'label' => 'Barangay', 'rules' => 'trim|required|xss_clean'),
        'municipality' => array('field' => 'municipality', 'label' => 'Municipality', 'rules' => 'trim|required|xss_clean'),
        'province' => array('field' => 'province', 'label' => 'Province', 'rules' => 'trim|required|xss_clean'),
        'mobile_no' => array('field' => 'mobile_no', 'label' => 'Mobile No', 'rules' => 'trim|required|xss_clean'),
        'business_type' => array('field' => 'business_type', 'label' => 'Business Type', 'rules' => 'trim|required|xss_clean'),
        'AreaId' => array('field' => 'AreaId', 'label' => 'Area', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'LoanTermId' => array('field' => 'LoanTermId', 'label' => 'Loan Term', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'collector_id' => array('field' => 'collector_id', 'label' => 'Loan Collector', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'LoanCategoryId' => array('field' => 'LoanCategoryId', 'label' => 'Loan Category', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'min_loanable_amount' => ['field' => 'min_loanable_amount', 'label' => 'Minimum Loanable Amount', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'max_loanable_amount' => ['field' => 'max_loanable_amount', 'label' => 'Maximum Loanable Amount', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'ModeOfPaymentId' => ['field' => 'ModeOfPaymentId', 'label' => 'Mode of Payment', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'],
        'LifeInsuranceId' => ['field' => 'LifeInsuranceId', 'label' => 'Life Insurance', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'],
        'loan_amount' => ['field' => 'loan_amount', 'label' => 'Loan Amount', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'kapamilya_insurance' => ['field' => 'kapamilya_insurance', 'label' => 'Life Insurance', 'rules' => 'trim|to_decimal|xss_clean'],
        'loan_protection_insurance' => ['field' => 'loan_protection_insurance', 'label' => 'Loan Protection Insurance', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'kasanib_fund' => ['field' => 'kasanib_fund', 'label' => 'Kasanib Fund', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'total_account_receivable' => ['field' => 'total_account_receivable', 'label' => 'Full  Account Receivable', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'service_charge' => ['field' => 'service_charge', 'label' => 'Service Charge', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'advance_interest' => ['field' => 'advance_interest', 'label' => 'Advance Interest', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'net_proceeds' => ['field' => 'net_proceeds', 'label' => 'Net Proceeds', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'total_cash_out' => ['field' => 'total_cash_out', 'label' => 'Total Cash Out', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'notarial' => ['field' => 'notarial', 'label' => 'Notarial', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'loan_amortization' => ['field' => 'loan_amortization', 'label' => 'Loan Amortization', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'kasanib_amortization' => ['field' => 'kasanib_amortization', 'label' => 'Kasanib Fund Amortization', 'rules' => 'trim|required|to_decimal|xss_clean'],
        'amortization_due' => ['field' => 'amortization_due', 'label' => 'Full Amortization', 'rules' => 'trim|required|to_decimal|xss_clean'],

        'start_of_payment' => ['field' => 'start_of_payment', 'label' => 'Start of Payment', 'rules' => 'trim|xss_clean'],
        'maturity_date' => ['field' => 'maturity_date', 'label' => 'Maturity Date', 'rules' => 'trim|xss_clean'],

        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $member_loan = new stdClass();
        $member_loan->transaction_no = '';
        $member_loan->date_of_filing = '';
        $member_loan->MemberId = '';
        $member_loan->name = '';
        $member_loan->firstname = '';
        $member_loan->middlename = '';
        $member_loan->lastname = '';
        $member_loan->street_no = '';
        $member_loan->barangay = '';
        $member_loan->municipality = '';
        $member_loan->province = '';        
        $member_loan->mobile_no = '';
        $member_loan->business_type = '';

        $member_loan->AreaId = '';
        $member_loan->LoanProgramId = '';
        $member_loan->loan_program = '';
        $member_loan->loan_category = '';

        $member_loan->collector_id = '';
        $member_loan->collector_name = '';
        $member_loan->LoanCategoryId = '';
        $member_loan->ModeOfPaymentId = '';
        $member_loan->LifeInsuranceId = '';
        $member_loan->min_loanable_amount = '';
        $member_loan->max_loanable_amount = '';
        $member_loan->LoanTermId = '';
        $member_loan->loan_term = '';
        $member_loan->life_insurance = '';
        $member_loan->mode_of_payment = '';        
        $member_loan->loan_requirements = '';
        $member_loan->loan_collaterals = '';
        $member_loan->loan_collateral_details = '';
        $member_loan->kapamilya_insurance = '';
        $member_loan->loan_protection_insurance = '';
        $member_loan->loan_amount = '';
        $member_loan->kasanib_fund = '';
        $member_loan->total_account_receivable = '';
        $member_loan->service_charge = '';
        $member_loan->advance_interest = '';
        $member_loan->net_proceeds = '';    
        $member_loan->total_cash_out = '';    

        $member_loan->notarial = '';
        $member_loan->loan_amortization = '';
        $member_loan->kasanib_amortization = '';
        $member_loan->amortization_due = '';
        $member_loan->start_of_payment = '';
        

        return $member_loan;
    }


    public function get_loans($id = NULL, $single = FALSE)
    {
        // Fetch member loans
        $this->db->select('member_loans.*,b.*,c.*,d.area_name');
        $this->db->join('member_loan_details as b', 'b.MemberLoanId = member_loan_id', 'left');
        $this->db->join('member_loan_statuses as c', 'c.MemberLoanId = member_loan_id', 'left');
        $this->db->join('areas as d', 'd.area_id = AreaId', 'left');
        $this->db->order_by('date_of_filing, name');
        return parent::get($id, $single);
    }

    public function get_members($id = NULL, $single = FALSE)
    {
        // Fetch members
        $this->db->select('member_id, c.LoanProgramId, c.LoanCategoryId, lastname, firstname, middlename, street_no, province, barangay, municipality, mobile_no, business_type, loan_program_name, loan_category_name, c.min_loanable_amount, c.max_loanable_amount ');
        $this->db->join('member_loan_profiles as c', 'c.MemberId = a.member_id', 'left');
        $this->db->join('loan_programs as d', 'd.loan_program_id = c.LoanProgramId', 'left');
        $this->db->join('loan_categories as e', 'e.loan_category_id = c.LoanCategoryId', 'left');
        return $this->db->order_by('lastname, firstname')->get('members as a')->result();
    }

    public function get_members_dropdown()
    {
        // Fetch areas
        $this->db->select('member_id, lastname, firstname, middlename');
        $this->db->join('member_loan_profiles as c', 'c.MemberId = a.member_id', 'left');
        $members = $this->db->order_by('lastname, firstname')->get('members as a')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($members)) 
        {
            
            foreach ($members as $member) 
            $array[$member->member_id] =   $member->lastname . ', ' . $member->firstname . ' ' . $member->middlename ;
        }

        return $array;
    }

    public function get_loan_collectors()
    {
        // Fetch areas
        $this->db->where('GroupId',config_item('collectors_group_id'));
        $this->db->where('AreaId',$this->session->userdata('area_id'));
        $this->db->select('user_id, lastname, firstname');
        $loan_collectors = $this->db->order_by('lastname, firstname')->get('users')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($loan_collectors)) 
        {
            foreach ($loan_collectors as $loan_collector) 
            $array[$loan_collector->user_id] =   $loan_collector->lastname . ', ' . $loan_collector->firstname;
        }

        
        return $array;

        
    }

    public function get_loan_requirements()
    {
        // Fetch areas
        $this->db->select('loan_requirement');
        $loan_requirements = $this->db->order_by('loan_requirement')->get('loan_requirements')->result();
         
        // Return key -> value pair array

        if (count($loan_requirements)) 
        {
            foreach ($loan_requirements as $loan_requirement) 
            $array[$loan_requirement->loan_requirement] =   $loan_requirement->loan_requirement;
        }

        return $array;
    }


    public function get_loan_collaterals()
    {
        // Fetch areas
        $this->db->select('loan_collateral');
        $loan_collaterals = $this->db->order_by('loan_collateral')->get('loan_collaterals')->result();
         
        // Return key -> value pair array

        if (count($loan_collaterals)) 
        {
            foreach ($loan_collaterals as $loan_collateral) 
            $array[$loan_collateral->loan_collateral] =   $loan_collateral->loan_collateral;
        }

        return $array;
    }

    public function get_mode_of_payments()
    {
        // Fetch areas
        $this->db->select('mode_of_payment_id, mode_of_payment');
        $mode_of_payments = $this->db->order_by('created_at, mode_of_payment')->get('mode_of_payments')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($mode_of_payments)) 
        {
            foreach ($mode_of_payments as $mode_of_payment) 
            $array[$mode_of_payment->mode_of_payment_id] =   $mode_of_payment->mode_of_payment;
        }

        return $array;
    }

    public function get_life_insurances()
    {
        // Fetch areas
        $this->db->select('life_insurance_id, life_insurance');
        $life_insurances = $this->db->order_by('created_at, life_insurance')->get('life_insurances')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($life_insurances)) 
        {
            foreach ($life_insurances as $life_insurance) 
            $array[$life_insurance->life_insurance_id] =   $life_insurance->life_insurance;
        }

        return $array;
    }



    public function get_loan_terms()
    {
        // Fetch areas
        $this->db->select('loan_term_id, loan_term, interest');
        $loan_terms = $this->db->order_by('created_at, loan_term')->get('loan_terms')->result();
         
        // Return key -> value pair array
        $array = array('' => '');
        if (count($loan_terms)) 
        {
            foreach ($loan_terms as $loan_term) 
            $array[$loan_term->loan_term_id] =   $loan_term->loan_term;
        }

        return $array;
    }


    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/loan_categories.php*/
 ?>