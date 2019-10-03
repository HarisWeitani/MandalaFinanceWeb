<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UNI_Controller extends CI_Controller {
    //declared data
	protected $data;

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		ini_set('max_execution_time', 600);
		ini_set('max_input_time', 600);

		//load database connection
		$this->load->database();

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: *");
		header("Access-Control-Allow-Headers: Authorization, Access-Control-Allow-Headers, Content-Type");

		//load helper
		$this->load->helper('array');
		$this->load->helper('date');
		$this->load->helper('email');
		$this->load->helper('file');
		$this->load->helper('form');
		$this->load->helper('text');
		$this->load->helper('url');
		$this->load->helper('security');
        $this->load->helper('string');
        
        //load library
        $this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('image_lib');
		$this->load->library('session');
		$this->load->library('upload');

		//custom library
		$this->load->library('layout');
        $this->load->library('session_entry');
        
		$this->layout->set_data($this->data);
    }

}

class UNIAdmin_Controller extends UNI_Controller {

    public function __construct() {
        parent::__construct();

        //DEFINE GLOBAL VARIABLE HERE

        $this->data['admin_name'] = $this->session->userdata('admin_name');

        $this->layout->set_masterpage(ADMIN_URL.'page');
        $unlocked = array('login');

        if ( ! $this->session_entry->check_logged_admin() AND ! in_array(strtolower(get_class($this)), $unlocked) ) {
            $this->session->set_flashdata('error','Please login first');
            redirect(ADMIN_URL_LOGIN);
        }else if ( $this->session_entry->check_logged_admin() AND in_array(strtolower(get_class($this)), $unlocked) ) {
            redirect(ADMIN_URL_DASHBOARD);
        }
    }
}

?>