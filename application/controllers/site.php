<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	

	public function login()
	{	
		// Redirect a user if he's already logged in
		$dashboard = 'dashboard';
		$this->users->logged_in() == FALSE || redirect($dashboard);

		// Set form
		$rules = $this->users->rules;
		$this->form_validation->set_rules($rules);

		// Process form
		if ($this->form_validation->run() == TRUE)
		{
			# authenticated and can now be redirected
			if ($this->users->login() == TRUE)
			{
				$this->user_activities->write('Login Successfully');
				redirect(site_url($dashboard), 'refresh');
			}
			else
			{
				$this->session->set_flashdata('error', '<h5>The following errors have occurred</h5> <ul> <li>Username/Password combination does not exists</li></ul>');
				redirect('site/login', 'refresh');
			}
		}


		if(validation_errors())
		{
			$validation_msg = "<h5>The following errors have occurred</h5> <ul>" . validation_errors('<li>','</li>') . "</ul>";
			$this->session->set_flashdata('error', $validation_msg);
			redirect('site/login');
		}

		// Load view
		$this->data['content'] = 'public/login/form';
		$this->data['site_title'] = 'Login';
		$this->load->view('public/template', $this->data);

	}

	public function logout()
	{
		$this->users->logout();
		$this->user_activities->write('Logout Successfully');
		redirect(site_url('site/login'));
	}

	public function hash()
	{

		echo hash('sha512', 'hgrunt85' . config_item('encryption_key'));

	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
