<?php 
/**
* Filename: life_insurances.php
* Author: Junard De Leon (PHP Developer)
*/
class Life_Insurances extends MY_Model
{
    protected $table_name = "life_insurances";
    protected $primary_key = "life_insurance_id";   
    protected $order_by = "life_insurances.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'LoanProgramId' => array('field' => 'LoanProgramId', 'label' => 'Loan Program', 'rules' => 'trim|required|is_natural_no_zero|xss_clean'),
        'life_insurance' => ['field' => 'life_insurance', 'label' => 'Life Insurance', 'rules' => 'trim|required|callback__unique_name|xss_clean'],
        'amount' => ['field' => 'amount', 'label' => 'Amount', 'rules' => 'trim|required|decimal|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $life_insurance = new stdClass();
        $life_insurance->LoanProgramId = '';
        $life_insurance->life_insurance = '';
        $life_insurance->amount = '';
        $life_insurance->remarks = '';        
        return $life_insurance;
    }

    public function get_life_insurances($id = NULL, $single = FALSE)
    {
        // Fetch loan terms
        $this->db->select('life_insurance_id, life_insurance, amount, loan_program_name');
        $this->db->join('loan_programs as c', 'c.loan_program_id = life_insurances.LoanProgramId', 'left');
        return parent::get($id, $single);
    }

    public function get_loan_programs()
    {
        // Fetch areas
        $this->db->select('loan_program_id, loan_program_code, loan_program_name');
        $loan_programs = $this->db->order_by('loan_program_code, loan_program_name')->get('loan_programs')->result();
         
        // Return key -> value pair array
        
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

/*Location: ./application/models/life_insurances.php*/
 ?>