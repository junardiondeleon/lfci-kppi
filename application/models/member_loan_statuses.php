<?php 
/**
* Filename: member_loan_statuses.php
* Author: Junard De Leon (PHP Developer)
*/
class Member_Loan_Statuses extends MY_Model
{
    protected $table_name = "member_loan_statuses";
    protected $primary_key = "MemberLoanId";   
    protected $order_by = "member_loan_status_id.created_at DESC";
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