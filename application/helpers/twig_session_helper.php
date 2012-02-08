<?php  if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

if (!function_exists('session_userdata')) {

	function session_userdata($param) {
		$obj =& get_instance();

		$obj->load->library('session');

		return $obj->session->userdata($param);
	}

}

if (!function_exists('session_flashdata')) {

	function session_flashdata($param) {
		$obj =& get_instance();

		$obj->load->library('session');

		return $obj->session->flashdata($param);
	}

}

/* End of file twig_session_helper.php */
/* Location: ./application/helpers/twig_session_helper.php */