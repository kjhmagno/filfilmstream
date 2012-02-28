<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters(
			'<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>', '</p>'
		);

		$this->lang->load('ffs', 'english');

		//sleep(2);
	}

	public function login()
	{
		if ($this->input->is_ajax_request()) {
			$ajaxMessage = array();

			$this->form_validation->set_rules('login_username', 'Username/Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('login_password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remember', 'Remember', 'xss_clean');

			if ($this->form_validation->run()) {
				$data = array(); $result = array();

				$this->load->library('Authenticate');

				$data['login'] = $this->form_validation->set_value('login_username');
				$data['password'] = $this->form_validation->set_value('login_password');
				$data['remember'] = $this->form_validation->set_value('remember');

				$result = $this->authenticate->login($data);

				if ($result) {
					$ajaxMessage = array('result' => TRUE, 'redirect' => 'apps/');
				} else {
					$error = $this->authenticate->getErrors();

					if (isset($error['error_password_incorrect'])) {
						$ajaxMessage = array(
							'result' => FALSE,
							'message' => sprintf($this->lang->line('message_wrapper'), $this->lang->line('error_password_incorrect'))
							);
					} else if (isset($error['error_login_not_found'])) {
						$ajaxMessage = array(
							'result' => FALSE,
							'message' => sprintf($this->lang->line('message_wrapper'), $this->lang->line('error_login_not_found'))
							);
					}
				}
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

			$this->form_validation->set_rules('register_username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('register_password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birth_date', 'Birth date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');

			if ($this->form_validation->run()) {
				$data = array(); $result = array();

				$this->load->library('Authenticate');

				$data['username'] = $this->form_validation->set_value('register_username');
				$data['password'] = $this->form_validation->set_value('register_password');
				$data['email'] = $this->form_validation->set_value('email');
				$data['last_name'] = $this->form_validation->set_value('last_name');
				$data['first_name'] = $this->form_validation->set_value('first_name');
				$data['middle_name'] = $this->form_validation->set_value('middle_name');
				$data['birth_date'] = $this->form_validation->set_value('birth_date');
				$data['address'] = $this->form_validation->set_value('address');
				$data['gender'] = $this->form_validation->set_value('gender');

				$result = $this->authenticate->register($data);

				if ($result) {
					$ajaxMessage = array('result' => TRUE, 'redirect' => 'welcome/customer_login');
				} else {
					$error = array();

					$error = $this->authenticate->getErrors();

					if (isset($error['error_username_in_use'])) {
						$ajaxMessage = array(
							'result' => FALSE,
							'message' => sprintf($this->lang->line('message_wrapper'), $this->lang->line('error_username_in_use'))
							);
					} else if (isset($error['error_email_in_use'])) {
						$ajaxMessage = array(
							'result' => FALSE,
							'message' => sprintf($this->lang->line('message_wrapper'), $this->lang->line('error_email_in_use'))
							);
					}
				}
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