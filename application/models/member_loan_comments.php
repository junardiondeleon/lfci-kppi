<?php 
/**
* Filename: member_loan_details.php
* Author: Junard De Leon (PHP Developer)
*/
class Member_Loan_Comments extends MY_Model
{
    protected $table_name = "member_loan_comments";
    protected $primary_key = "MemberLoanId";   
    protected $order_by = "member_loan_comment_id.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array('remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|required|xss_clean'],
    );


    public function get_member_loan_comments($id = NULL, $single = FALSE)
    {
        // Fetch members
        $this->db->select('remarks, lastname, firstname, member_loan_comments.created_at as c_at');
        $this->db->join('users as c', 'c.user_id = member_loan_comments.UserId', 'left');
        return parent::get($id, $single);
    }

    
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