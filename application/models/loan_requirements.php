<?php 
/**
* Filename: loan_requirement.php
* Author: Junard De Leon (PHP Developer)
*/
class Loan_Requirements extends MY_Model
{
    protected $table_name = "loan_requirements";
    protected $primary_key = "loan_requirement_id";   
    protected $order_by = "loan_requirement.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'loan_requirement' => ['field' => 'loan_requirement', 'label' => 'Requirement', 'rules' => 'trim|required|callback__unique_name|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $loan_requirement = new stdClass();
        $loan_requirement->LoanProgramId = '';
        $loan_requirement->loan_requirement = '';
        $loan_requirement->remarks = '';        
        return $loan_requirement;
    }

    public function get_loan_requirements($id = NULL, $single = FALSE)
    {
        // Fetch loan terms
        $this->db->select('loan_requirement_id, loan_requirement, loan_program_name');
        $this->db->join('loan_programs as c', 'c.loan_program_id = loan_requirements.LoanProgramId', 'left');
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

/*Location: ./application/models/loan_requirement.php*/
 ?>