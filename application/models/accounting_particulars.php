<?php 
/**
* Filename: accounting_particulars.php
* Author: Junard De Leon (PHP Developer)
*/
class Accounting_Particulars extends MY_Model
{
    protected $table_name = "accounting_particulars";
    protected $primary_key = "accounting_particular_id";   
    protected $order_by = "accounting_particular.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'accounting_particular_code' => ['field' => 'accounting_particular_code', 'label' => 'Accounting Particular Code', 'rules' => 'trim|required|strtoupper|min_length[5]|max_length[30]|callback__unique_code|html_escape|xss_clean'],
        'accounting_particular_name' => ['field' => 'accounting_particular_name', 'label' => 'Accounting Particular Name', 'rules' => 'trim|required|min_length[5]|max_length[255]|callback__unique_name|html_escape|xss_clean'],
        'accounting_particular_type' => ['field' => 'accounting_particular_type', 'label' => 'Accounting Particular Type', 'rules' => 'trim|required|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $accounting_particular = new stdClass();
        $accounting_particular->accounting_particular_code = '';
        $accounting_particular->accounting_particular_name = '';
        $accounting_particular->accounting_particular_type = '';
        $accounting_particular->remarks = '';        
        return $accounting_particular;
    }




    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/accounting_particular.php*/
 ?>