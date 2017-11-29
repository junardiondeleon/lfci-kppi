<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_Category extends Admin_Controller 
{
	function __construct() 
	{
		parent::__construct();		
		if(config_item('admin_group_id') != $this->session->userdata('user_group_id')) {
		 	$this->session->set_flashdata('error', 'You are not allowed to access this page.');
			redirect('dashboard', 'refresh');
		}
		$this->data['site_title'] = 'Loan Categories';
		$this->data['page_title'] = 'Loan Categories';
		$this->data['sub_page_title'] = '';
		$this->data['view_only'] = FALSE;
		$this->load->model('loan_categories');
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
		$config['total_rows'] = $this->loan_categories->count();
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
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_category')."'><i class='fa fa-plus'></i> Reset Search</a>";
			$q = $this->input->post('keywords');
			$by = $this->input->post('by');
			if ($by == "loan_category_code") 
			{
				$this->db->like('loan_category_code', $q, 'after');
			}
			elseif ($by == "loan_category_name") 
			{
				$this->db->like('loan_category_name', $q, 'after');
			}
			unset($this->data['pagination']);
		}

		if ($this->input->post('btn_action') == 'Filter') 
		{
			$this->data['box_title'] = "Search Result " . "<a class='btn btn-default' href='".base_url('loan_category')."'><i class='fa fa-plus'></i> Reset Search</a>";
			
			$by = $this->input->post('LoanProgramId');
			
			$this->db->where('LoanProgramId', $by);
			
			unset($this->data['pagination']);
		}

		
		// Fecth all project
		$this->db->order_by('LoanProgramId,loan_category_name');
		$this->data['sub_page_title'] = "<a class='btn btn-info' href='".base_url('loan_category/new')."'><i class='fa fa-plus'></i> New Loan Category</a>";		
		$this->data['loan_categories'] = $this->loan_categories->get_loan_categories();
		$this->data['loan_programs'] = $this->loan_categories->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		$this->user_activities->write('Viewing List of ' . $this->data['page_title']);
		// Load view 
		$this->load_view('admin/loan_category/index');

	}	

	
	public function view($id = NULL)
	{
		$this->data['view_only'] = TRUE;

		// Fetch a loan_category or create a new loan_category
		if ($id) 
		{
			$this->data['loan_category'] = $this->loan_categories->get($id);
			if(!count($this->data['life_insurance'])) {
					$this->session->set_flashdata('error', 'Loan Category could not be found');
				redirect('areas', 'refresh');
			}
			$this->data['page_title'] = 'Viewing Loan Category - ' . $this->data['loan_category']->loan_category_name;
			$this->user_activities->write($this->data['page_title']);
		}
		
		$this->data['loan_programs'] = $this->loan_categories->get_loan_programs();
		$this->data['alerts_sidebar'] = TRUE;
		
		// Load the view
		$this->load_view('admin/loan_category/view');
	}

	


	public function edit($id = NULL)
	{


		// Fetch a loan_category or create a new loan_category
		if ($id) 
		{
			$this->data['loan_category'] = $this->loan_categories->get($id);
			
			if(!count($this->data['life_insurance'])) {
					$this->session->set_flashdata('error', 'Loan Category could not be found');
				redirect('areas', 'refresh');
			}
			$this->data['page_title'] = 'Editing Loan Category - ' . $this->data['loan_category']->loan_category_name;
			$this->user_activities->write($this->data['page_title']);
		}
		else
		{
			$this->data['page_title'] = 'New Loan Category';
			$this->data['loan_category'] = $this->loan_categories->get_new();
			$this->user_activities->write('Creating ' . $this->data['page_title']);
		}

		// Set up the form
		$rules = $this->loan_categories->rules;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) 
		{
			// store user id
			

			$data = $this->loan_categories->array_from_post(array(
				'LoanProgramId', 
				'loan_category_code', 
				'loan_category_name', 
				'min_loanable_amount',
				'max_loanable_amount',
				'remarks',
				)
			);

			
			
			$this->loan_categories->save($data, $id);
			$message = "Loan Category " . $data['loan_category_name'] . " has been successfully saved.";
			$this->user_activities->write($message);
			// redirect to loan_category
			redirect(site_url('loan_category/index'));
		}

		$this->data['alerts_sidebar'] = TRUE;
		$this->data['loan_programs'] = $this->loan_categories->get_loan_programs();
		
		// Load the view
		$this->load_view('admin/loan_category/edit');
	}

	public function delete($id = NULL)
	{
		// fetch data
		$loan_category = $this->loan_categories->get($id, TRUE);
		if(!count($loan_category)) {
				$this->session->set_flashdata('error', 'Loan Category could not be found');
			redirect('loan_categories', 'refresh');
		}
		// process delete
		$this->loan_categories->delete($id);

		$message = "Loan Category " . $loan_category->loan_category_name . " has been removed successfully.";
		$this->user_activities->write($message);

		// redirect to project
		redirect(site_url('loan_category'));
	}


	public function _unique_name($str)
	{
		// Do NOT validate if project already exists
		// UNLESS it's the name for the current project
		$id = $this->uri->segment(2);
		
		$this->db->where('loan_category_name',$this->input->post('loan_category_name'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('loan_category_id !=', $id);

		$loan_categories = $this->loan_categories->get();

		if (count($loan_categories)) 
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
		
		$this->db->where('loan_category_code',$this->input->post('loan_category_code'))->where('LoanProgramID',$this->input->post('LoanProgramID'));
		!$id || $this->db->where('loan_category_id !=', $id);

		$loan_categories = $this->loan_categories->get();

		if (count($loan_categories)) 
		{
			$this->form_validation->set_message('_unique_code', "%s is already exists in the list.");
			return FALSE;
		}

		return TRUE;
	}

	

}

/* End of file deduction_category.php */
/* Location: ./application/controllers/deduction_category.php */