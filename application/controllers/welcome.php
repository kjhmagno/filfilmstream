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
		$this->_var['title'] = "FilFilmStream";
		$this->twig->add_function(array_merge($this->config->item('ci_html')));

		$this->twig->display('welcome/index.twig', $this->_var);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */