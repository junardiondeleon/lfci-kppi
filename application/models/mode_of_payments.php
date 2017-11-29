<?php 
/**
* Filename: mode_of_payments.php
* Author: Junard De Leon (PHP Developer)
*/
class Mode_Of_Payments extends MY_Model
{
    protected $table_name = "mode_of_payments";
    protected $primary_key = "mode_of_payment_id";   
    protected $order_by = "mode_of_payments.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'mode_of_payment_name' => ['field' => 'mode_of_payment', 'label' => 'Loan Term', 'rules' => 'trim|required|callback__unique_name|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $mode_of_payment = new stdClass();
        $mode_of_payment->LoanProgramId = '';
        $mode_of_payment->mode_of_payment = '';
        $mode_of_payment->remarks = '';        
        return $mode_of_payment;
    }

    public function get_mode_of_payments($id = NULL, $single = FALSE)
    {
        // Fetch loan terms
        $this->db->select('mode_of_payment_id, mode_of_payment, loan_program_name');
        $this->db->join('loan_programs as c', 'c.loan_program_id = mode_of_payments.LoanProgramId', 'left');
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

/*Location: ./application/models/mode_of_payments.php*/
 ?>