<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_Category extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();	
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('logout', 'refresh');
		}	
		$this->data['site_title'] = 'Payment Categories';
		$this->data['page_title'] = 'Payment Categories';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('payment_categories');
	}

	public function index()
	{
		// // Filter user account per user
		// if ($this->session->userdata('AccountType') !== 'S') 
		// {
		// 	$filter_user = array('user_id' => $this->session->userdata('Id'));
		// 	$this->db->where($filter_user);
		// }

		// Set up pagination 
		$config['total_rows'] = $this->payment_categories->count();
		$config['per_page'] = 15;
		$this->pagination->initialize($config);
		if($this->uri->segment(3) != '')
			$this->data['record_no'] = $this->uri->segment(3);	
		else
			$this->data['record_no'] = 0;
		// Create pagination links
		$this->data['pagination'] = $this->pagination->create_links();
		$this->data['box_title'] = '';
		// Retrieve paginated results, using the dynamically determined offset
		$this->db->limit($config['per_page'], $this->pagination->offset);

		if ($this->input->post('btn_action') == 'Submit') 
		{
			$this->form_validation->set_rules('keywords', 'Search', 'required|strtoupper');
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('payment_category')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "payment_category_code") 
			{
				$this->db->like('payment_category_code', $q, 'after');
			}
			elseif ($by == "payment_category_name") 
			{
				$this->db->like('payment_category_name', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('payment_category_name');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('payment_category/new')."'><i class='fa fa-plus'></i> New Payment Category</a>";		
		$this->data['payment_categories'] = $this->payment_categories->get();
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		$this->data['alerts_sidebar'] = TRUE;
		// Load view 
		$this->load_view('admin/payment_category/index');

	}	

	
	public function view($id = NULL)
	{

		$this->data['view_only'] = TRUE;
		// Fetch a payment_category or create a new payment_category
		if ($id) 
		{
			$this->data['payment_category'] = $this->payment_categories->get($id);
			if(!count($this->data['payment_category'])) {
				$this->session->set_flashdata('error', 'Payment Category could not be found');
			redirect('payment_categories', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Payment Category - ' . $this->data['payment_category']->payment_category_name;
			$this->user_activities->write($this->data['page_title']);
		}
		

		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/payment_category/view');
	}

	public function edit($id = NULL)
	{


		// Fetch a payment_category or create a new payment_category
		if ($id) 
		{
			$this->data['payment_category'] = $this->payment_categories->get($id);
			
			if(!count($this->data['payment_category'])) {
				$this->session->set_flashdata('error', 'Payment Category could not be found');
			redirect('payment_categories', 'refresh');
			}
			$this->data['page_title'] = 'Editing Payment Category - ' . $this->data['payment_category']->payment_category_name;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Payment Category';
			$this->data['payment_category'] = $this->payment_categories->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->payment_categories->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->payment_categories->array_from_post(array(
				'payment_category_name', 
				'payment_category_code', 
				'remarks',
				)
			);

			
			
			$this->payment_categories->save($data, $id);
			$message = "Payment Category " . $data['payment_category_name'] . " has been successfully saved.";
			$this->user_activities->write($message);
			// redirect to payment_category
			redirect(site_url('payment_category/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;

		
		// Load the view
		$this->load_view('admin/payment_category/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$payment_category = $this->payment_categories->get($id, TRUE);
		if(!count($payment_category)) {
				$this->session->set_flashdata('error', 'Payment Category could not be found');
			redirect('payment_categories', 'refresh');
		}
		// process delete
		$this->payment_categories->delete($id);

		$message = "Payment Category " . $payment_category->payment_category_name . " has been successfully removed.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('payment_category'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('payment_category_name',$this->input->post('payment_category_name'));
		!$id || $this->db->where('payment_category_id !=', $id);

		$payment_categories = $this->payment_categories->get();

		if (count($payment_categories)) 
		{
			$this->form_validation->set_message('_unique_name', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	public function _unique_code($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('payment_category_code',$this->input->post('payment_category_code'));
		!$id || $this->db->where('payment_category_id !=', $id);

		$payment_categories = $this->payment_categories->get();

		if (count($payment_categories)) 
		{
			$this->form_validation->set_message('_unique_code', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */