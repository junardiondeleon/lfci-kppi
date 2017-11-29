<?php 
/**
* Filename: loan_categories.php
* Author: Junard De Leon (PHP Developer)
*/
class Loan_Categories extends MY_Model
{
    protected $table_name = "loan_categories";
    protected $primary_key = "loan_category_id";   
    protected $order_by = "loan_categories.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'loan_category_code' => ['field' => 'loan_category_code', 'label' => 'Loan Category Code', 'rules' => 'trim|required|callback__unique_code|xss_clean'],
        'loan_category_name' => ['field' => 'loan_category_name', 'label' => 'Loan Category Name', 'rules' => 'trim|required|callback__unique_name|xss_clean'],
        'min_loanable_amount' => ['field' => 'min_loanable_amount', 'label' => 'Minimun Loanable Amount', 'rules' => 'trim|required|to_decimal|decimal|xss_clean'],
        'max_loanable_amount' => ['field' => 'max_loanable_amount', 'label' => 'Maximun Loanable Amount', 'rules' => 'trim|required|to_decimal|decimal|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $loan_category = new stdClass();
        $loan_category->LoanProgramId = '';
        $loan_category->loan_category_code = '';
        $loan_category->loan_category_name = '';
        $loan_category->min_loanable_amount = '';
        $loan_category->max_loanable_amount = '';
        $loan_category->remarks = '';        
        return $loan_category;
    }

    public function get_loan_categories($id = NULL, $single = FALSE)
    {
        // Fetch loan categories
        $this->db->select('loan_category_id, loan_program_name, loan_category_name, min_loanable_amount, max_loanable_amount');
        $this->db->join('loan_programs as c', 'c.loan_program_id = loan_categories.LoanProgramId', 'left');
        return parent::get($id, $single);
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
            $array[$loan_program->loan_program_id] =  $loan_program->loan_program_name;
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