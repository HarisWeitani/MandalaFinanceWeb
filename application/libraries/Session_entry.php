<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Session_entry {
	//declared data
	private $obj;
	
	public function __construct() {
		$this->obj =& get_instance();
	}
	
	public function check_logged_admin() {
		//check exist session
		if($this->obj->session) {
			//check logged admin status
			if($this->obj->session->userdata('logged_admin')) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	
	public function login_admin() {
		//get input
		$username = $this->obj->input->post('username');
		$password = md5($this->obj->input->post('password'));
		//die($password);
		//get data from database
		$this->obj->db->where('admin_status', '1');
		$query = $this->obj->db->get('ms_admin');
		
		//declared flag
		$login_result = FALSE;
		
		//check exist data
		foreach($query->result() as $row) {
			//validating username and password
			if($row->admin_username==$username && $row->admin_password==$password) {
				//change flag
				$admin_id = $row->admin_id;
				$admin_name = $row->admin_name;
				$admin_privilege_id = $row->admin_privilege_id;
				$login_result = TRUE;
			}
		}

		//choose condition
		if($login_result) {
			//success login
			$credentials = array('admin_id' => $admin_id,'admin_name' => $admin_name, 'admin_privilege_id' => $admin_privilege_id, 'logged_admin' => TRUE);
			$this->obj->session->set_userdata($credentials);
			redirect(ADMIN_URL . ADMIN_URL_CALCULATION);
		} else {
			//fail login
			$this->obj->session->set_flashdata('error','Invalid username or password');
			$this->obj->session->set_flashdata('username',$username);
			redirect(ADMIN_URL_LOGIN);
		}
	}

	public function check_logged_account() {
		//check exist session
		if($this->obj->session) {
			//check logged account status
			if($this->obj->session->userdata('logged_account')) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

}