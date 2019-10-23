<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends UNIAdmin_Controller {

	public function index() {
		$this->session->sess_destroy();
		redirect(ADMIN_URL_LOGIN);
	}
}
?>