<?php 
/**
* Filename: loan_programs.php
* Author: Junard De Leon (PHP Developer)
*/
class Loan_Programs extends MY_Model
{
    protected $table_name = "loan_programs";
    protected $primary_key = "loan_program_id";   
    protected $order_by = "loan_programs.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'loan_program_code' => ['field' => 'loan_program_code', 'label' => 'Loan Program Code', 'rules' => 'trim|required|strtoupper|min_length[5]|max_length[30]|callback__unique_code|html_escape|xss_clean'],
        'loan_program_name' => ['field' => 'loan_program_name', 'label' => 'Loan Program Name', 'rules' => 'trim|required|min_length[5]|max_length[255]|callback__unique_name|html_escape|xss_clean'],
        'loan_program_description' => ['field' => 'loan_program_description', 'label' => 'Description', 'rules' => 'trim|required|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $loan_program = new stdClass();
        $loan_program->loan_program_code = '';
        $loan_program->loan_program_name = '';
        $loan_program->loan_program_description = '';
        $loan_program->remarks = '';        
        return $loan_program;
    }




    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/loan_programs.php*/
 ?>