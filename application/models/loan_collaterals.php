<?php 
/**
* Filename: loan_collateral.php
* Author: Junard De Leon (PHP Developer)
*/
class Loan_Collaterals extends MY_Model
{
    protected $table_name = "loan_collaterals";
    protected $primary_key = "loan_collateral_id";   
    protected $order_by = "loan_collateral.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|xss_clean'),
        'loan_collateral' => ['field' => 'loan_collateral', 'label' => 'Requirement', 'rules' => 'trim|required|callback__unique_name|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $loan_collateral = new stdClass();
        $loan_collateral->LoanProgramId = '';
        $loan_collateral->loan_collateral = '';
        $loan_collateral->remarks = '';        
        return $loan_collateral;
    }

    public function get_loan_collaterals($id = NULL, $single = FALSE)
    {
        // Fetch loan terms
        $this->db->select('loan_collateral_id, loan_collateral, loan_program_name');
        $this->db->join('loan_programs as c', 'c.loan_program_id = loan_collaterals.LoanProgramId', 'left');
        return parent::get($id, $single);
    }

    public function get_loan_programs()
    {
        // Fetch areas
        $this->db->select('loan_program_id, loan_program_code, loan_program_name');
        $loan_programs = $this->db->order_by('loan_program_code, loan_program_name')->get('loan_programs')->result();
         
        // Return key -> value pair array
        $array = array('0' => 'All Loan Programs');
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

/*Location: ./application/models/loan_collateral.php*/
 ?>