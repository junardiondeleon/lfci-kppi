<?php 
/**
* Filename: activity_m.php
* Author: Brando Talaguit (ITC Developer)
*/
class User_Activities extends MY_Model
{

	protected $table_name = "activity_logs";
	protected $primary_key = "activity_log_id";	
	protected $order_by = "created_at DESC";
	protected $timestamps = TRUE;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}

	public function write($message, $table = NULL) 
	{
		
		$user_id = $this->session->userdata('user_id');
	    if(intval($user_id) == 0) { // invalid user
	        return false;
	    }

	    $filter = $this->primary_filter;
	    $id = $filter($user_id);

	    if (!$id) 
	    {
	    	return FALSE;
	    }

	    $data['action'] = $message;
	    $data['user_id'] = intval($user_id);
	    $data['created_by'] = intval($user_id);
	    $data['client_ip'] = $this->input->server('REMOTE_ADDR');
	    $data['request_uri'] = $this->input->server('REQUEST_URI');
	    $data['referer_page'] = $this->agent->referrer();
	    $data['created_at'] = date('Y-m-d H:i:s');

	    $this->db->set($data);
	    $this->db->insert($this->table_name, $data);

	} 


}

/*Location: ./application/models/activity_m.php*/
 ?>