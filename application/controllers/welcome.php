<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	private $_var = array();

	public function __construct()
	{
		parent::__construct();

		$this->_var['title'] = $this->config->item('title');
	}

	public function index()
	{
		$this->load->helper('form');

		$this->_var['title'] = "FilFilmStream";
		$this->twig->add_function(array_merge(
			$this->config->item('ci_html'), $this->config->item('ci_url'), $this->config->item('ci_form')
		));

		$this->twig->display('welcome/index.twig', $this->_var);
	}

	public function customer_login()
	{
		$this->load->helper('form');

		$this->_var['title'] = "FilFilmStream";
		$this->twig->add_function(array_merge(
			$this->config->item('ci_html'), $this->config->item('ci_url'), $this->config->item('ci_form')
		));

		$this->twig->display('welcome/customer_login.twig', $this->_var);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */