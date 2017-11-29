<?php 
/**
* Filename: payment_categories.php
* Author: Junard De Leon (PHP Developer)
*/
class Payment_Categories extends MY_Model
{
    protected $table_name = "payment_categories";
    protected $primary_key = "payment_category_id";   
    protected $order_by = "payment_categories.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'payment_category_code' => ['field' => 'payment_category_code', 'label' => 'Group Code', 'rules' => 'trim|required|strtoupper|min_length[5]|max_length[30]|callback__unique_code|html_escape|xss_clean'],
        'payment_category_name' => ['field' => 'payment_category_name', 'label' => 'Group Name', 'rules' => 'trim|required|min_length[5]|max_length[255]|callback__unique_name|html_escape|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $payment_category = new stdClass();
        $payment_category->payment_category_code = '';
        $payment_category->payment_category_name = '';
        $payment_category->remarks = '';        
        return $payment_category;
    }




    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/payment_categories.php*/
 ?>