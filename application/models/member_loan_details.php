<?php 
/**
* Filename: member_loan_details.php
* Author: Junard De Leon (PHP Developer)
*/
class Member_Loan_Details extends MY_Model
{
    protected $table_name = "member_loan_details";
    protected $primary_key = "MemberLoanId";   
    protected $order_by = "member_loan_detail_id.created_at DESC";
    protected $timestamps = FALSE;

    
    
    function __construct()
    {
        parent::__construct();
    }


    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/loan_categories.php*/
 ?>