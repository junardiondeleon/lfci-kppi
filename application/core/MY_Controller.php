<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
		$this->load->helper('form');
		$this->load->library('session');

	}


	public function load_view($page)
	{
		$this->data['content'] = $page;
		$this->load->view('admin\template', $this->data);
	}

	public function redirect_to($msg, $redirect_to = 'dashboard', $error = TRUE)
	{
		// $this->session->set_userdata($error == TRUE ? 'error' : 'success', $msg);
		if ($error == TRUE)
		{
			$this->session->set_flashdata('error', $msg);
		}
		else
		{
			$this->session->set_flashdata('success', $msg);
		}
		redirect(base_url($redirect_to));
	}

	public function redirect_with($uri, $data = array())
	{
		if (is_array($data))
		{
			foreach ($data as $key => $value)
			$this->session->set_flashdata($key, $value);
		}

		return redirect($uri);
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/controllers/site.php */
