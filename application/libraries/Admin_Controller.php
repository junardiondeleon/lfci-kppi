<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
	protected $limit = 15;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('users');
		$this->load->model('user_activities');

		$model = $this->router->class . '_m';
		if(file_exists(APPPATH."models/$model.php"))
		{
		   $this->load->model($model);
		}

		$this->form_validation->set_error_delimiters('<li>', '</li>');

		// Login Check
		$exception_uris = array(
			'site/login',
			'site/logout',
		);

		if (in_array(uri_string(), $exception_uris) == FALSE)
		{
			if ($this->users->logged_in() == FALSE)
			{
				redirect(site_url('site/login'));
			}
		}

		$attribute = ['role' => 'form'];
		$this->data['form_url'] = form_open(NULL, $attribute);
		$this->data['alerts'] = 'admin/alerts';
		$this->data['page_right_title'] = '';
		$this->data['counter'] = $this->uri->segment(3, 0);
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Admin_Controller.php */
