<?php 
/**
* Filename: groups.php
* Author: Junard De Leon (PHP Developer)
*/
class Groups extends MY_Model
{
    protected $table_name = "groups";
    protected $primary_key = "group_id";   
    protected $order_by = "groups.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'group_code' => ['field' => 'group_code', 'label' => 'Group Code', 'rules' => 'trim|required|strtoupper|min_length[2]|max_length[30]|callback__unique_code|html_escape|xss_clean'],
        'group_name' => ['field' => 'group_name', 'label' => 'Group Name', 'rules' => 'trim|required|min_length[5]|max_length[255]|callback__unique_name|html_escape|xss_clean'],
        
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $group = new stdClass();
        $group->group_code = '';
        $group->group_name = '';
        
        $group->remarks = '';        
        return $group;
    }




    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/groups.php*/
 ?>