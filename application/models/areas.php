<?php 
/**
* Filename: areas.php
* Author: Junard De Leon (PHP Developer)
*/
class Areas extends MY_Model
{
    protected $table_name = "areas";
    protected $primary_key = "area_id";   
    // protected $order_by = "areas.created_at DESC";
    protected $timestamps = TRUE;

    public $rules = array(
        'area_code' => ['field' => 'area_code', 'label' => 'Area Code', 'rules' => 'trim|required|min_length[2]|max_length[30]|callback__unique_code|html_escape|strtoupper|xss_clean'],
        'area_name' => ['field' => 'area_name', 'label' => 'Area Name', 'rules' => 'trim|required|min_length[5]|max_length[255]|callback__unique_name|html_escape|xss_clean'],
        
        'street_no' => ['field' => 'street_no', 'label' => 'Street No', 'rules' => 'trim|required|xss_clean'],
        'barangay' => ['field' => 'barangay', 'label' => 'Barangay', 'rules' => 'trim|xss_clean'],
        'municipality' => ['field' => 'municipality', 'label' => 'Municipality', 'rules' => 'trim|required|xss_clean'],
        'province' => ['field' => 'province', 'label' => 'Province', 'rules' => 'trim|required|xss_clean'],
        'remarks' => ['field' => 'remarks', 'label' => 'Remarks', 'rules' => 'trim|xss_clean'],
    );
    
    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $area = new stdClass();
        $area->area_code = '';
        $area->area_name = '';
        $area->street_no = '';
        $area->barangay = '';
        $area->municipality = '';
        $area->province = '';
        $area->remarks = '';        
        
        return $area;
    }

    public function delete($id)
    {
        // Delete a status
        parent::delete($id);

        
    }

    
}

/*Location: ./application/models/areas.php*/
 ?>