<?php 
/**
* Filename: loan_terms.php
* Author: Junard De Leon (PHP Developer)
*/
class Loan_Terms extends MY_Model
{
    protected $table_name = "loan_terms";
    protected $primary_key = "loan_term_id";   
    protected $order_by = "loan_terms.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'loan_term' => ['field' => 'loan_term', 'label' => 'Loan Term', 'rules' => 'trim|required|callback__unique_name|xss_clean'],
        'loan_divisor' => ['field' => 'loan_divisor', 'label' => 'No of Days and Week', 'rules' => 'trim|required|decimal|xss_clean'],
        'interest' => ['field' => 'interest', 'label' => 'Interest', 'rules' => 'trim|required|decimal|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $loan_term = new stdClass();
        $loan_term->LoanProgramId = '';
        $loan_term->loan_term = '';
        $loan_term->loan_divisor = '';
        $loan_term->interest = '';
        $loan_term->remarks = '';        
        return $loan_term;
    }

    public function get_loan_terms($id = NULL, $single = FALSE)
    {
        // Fetch loan terms
        $this->db->select('loan_term_id, loan_term, interest, loan_program_name');
        $this->db->join('loan_programs as c', 'c.loan_program_id = loan_terms.LoanProgramId', 'left');
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
            $array[$loan_program->loan_program_id] =   $loan_program->loan_program_name;
        }

        return $array;
    }



    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/loan_terms.php*/
 ?>