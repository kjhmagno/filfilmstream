<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Twig {

	private $CI;
	private $_twig;
	private $_template_dir;
	private $_cache_dir;

	public function __construct($debug = FALSE) {

		$this->CI = & get_instance();

		/*
		 * $this->CI->config->load('twig');
		 */

		ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries/Twig');
		require_once (string) "Autoloader" . EXT;

		log_message('debug', "Twig Autoloader Loaded");

		Twig_Autoloader::register();

		$this->_template_dir = $this->CI->config->item('template_dir');
		$this->_cache_dir = $this->CI->config->item('cache_dir');

		$loader = new Twig_Loader_Filesystem($this->_template_dir);

		$this->_twig = new Twig_Environment($loader, array(
                    /*'cache' => $this->_cache_dir,*/
                    'debug' => $debug
		));
	}

	public function add_function($function) {

		if (is_array($function)) {
			foreach ($function as $name)
			$this->_twig->addFunction($name, new Twig_Function_Function($name, array('is_safe' => array('html'))));
		} else {
			$this->_twig->addFunction($function, new Twig_Function_Function($function, array('is_safe' => array('html'))));
		}
	}

	public function render($template, $data=array()) {

		$template = $this->_twig->loadTemplate($template);
		return $template->render($data);
	}

	public function display($template, $data=array()) {

		$template = $this->_twig->loadTemplate($template);
		$data['elapsed_time'] = $this->CI->benchmark->elapsed_time('total_execution_time_start', 'total_execution_time_end');
		$memory = (!function_exists('memory_get_usage')) ? '0' : round(memory_get_usage() / 1024 / 1024, 2) . 'MB';
		$data['memory_usage'] = $memory;
		$template->display($data);
	}

}

/*
 * End of file: Twig.php
 * Location: ./application/libraries/Twig.php
 */