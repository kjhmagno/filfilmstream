<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>', '</p>');

		//sleep(2);
	}

	public function login()
	{
		if ($this->input->is_ajax_request()) {
			$ajaxMessage = array();

			$this->form_validation->set_rules('user', 'Username/Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			if ($this->form_validation->run()) {
				$ajaxMessage = array('result' => TRUE);
			} else {
				$ajaxMessage = array('result' => FALSE, 'message' => validation_errors());
			}

			echo json_encode($ajaxMessage);
		} else {
			exit();
		}
	}

	public function register()
	{
		if ($this->input->is_ajax_request()) {
			$ajaxMessage = array();

			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birth_date', 'Birth date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');

			if ($this->form_validation->run()) {
				$data = array(); $result = array(); $ajax = array();

				$this->load->library('Authenticate');

				$data['username'] = $this->form_validation->set_value('username');
				$data['password'] = $this->form_validation->set_value('password');
				$data['email'] = $this->form_validation->set_value('email');
				$data['last_name'] = $this->form_validation->set_value('last_name');
				$data['first_name'] = $this->form_validation->set_value('first_name');
				$data['middle_name'] = $this->form_validation->set_value('middle_name');
				$data['birth_date'] = $this->form_validation->set_value('birth_date');
				$data['address'] = $this->form_validation->set_value('address');
				$data['gender'] = $this->form_validation->set_value('gender');

				$result = $this->authenticate->register($data);

				$ajaxMessage = array('result' => TRUE, 'data' => $result);
			} else {
				$ajaxMessage = array('result' => FALSE, 'message' => validation_errors());
			}

			echo json_encode($ajaxMessage);
		} else {
			exit();
		}
	}

}

/* End of file process.php */
/* Location: ./application/controllers/process.php */