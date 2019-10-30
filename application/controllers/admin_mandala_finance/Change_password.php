<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends UNIAdmin_Controller {
	
	//check
	public function __construct() {
		parent::__construct();
		$this->load->model("Model_administrator");

		$this->menu_title = "Change Password";
	}

	//check
	private function set_header(){
		$this->layout->set_title($this->menu_title);
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['error'] = $this->session->flashdata('error');
	}

	//check
	public function form($id) {
		$this->set_header();
		if($_POST)
		{
			$this->data['admin_password'] = $this->input->post('admin_password');
			$this->data["old_admin_password"] = $this->input->post('old_admin_password');
			$this->data['admin_id'] = $this->session->userdata('admin_id');
			$this->form_validation->set_rules('admin_password','New Password','required');
			$this->form_validation->set_rules('old_admin_password','Old Password','required');

			if($this->form_validation->run())
			{	
				$administrator = $this->Model_administrator->getDataById($id)->row();
				
				if($administrator->admin_password != md5($this->data["old_admin_password"]))
				{
					$this->session->set_flashdata("error", "Password Incorrect");
					redirect(ADMIN_URL.$this->router->fetch_class().'/form'. '/' . $this->session->userdata('admin_id'));
				}

                $this->Model_administrator->updateData($this->data);
                $this->session->set_flashdata('message', 'Successfully Update Data');
                redirect(ADMIN_URL.$this->router->fetch_class().'/success');
				
			}
		}
		$this->layout->view(ADMIN_URL.$this->router->fetch_class().'/form');
	}

	public function success(){
		$this->layout->view(ADMIN_URL.$this->router->fetch_class().'/success');
	}


}
?>