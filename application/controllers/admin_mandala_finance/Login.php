<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends UNIAdmin_Controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function index() {
		if($_POST) {
			$this->session_entry->login_admin();
		}

		$data['username'] = $this->session->flashdata('username');
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');

		$this->load->view(ADMIN_URL_LOGIN.'view', $data);
	}
}
?>