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
	
	public function upload_image($file, $upload_path, $resize = null, $upload_folder)
	{
		//Upload Thumbnail
		if($upload_folder == null){
			$folder = $this->router->fetch_class();
		}else{
			$folder = $upload_folder;
		}

		$config['upload_path'] = './' . ASSETS_UPLOADS_URL . $folder . '/original/' . $upload_path . '/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		//$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		if($this->upload->do_upload($file))
		{
			$upload = $this->upload->data();
			$file_name = $upload['file_name'];

			if($resize == null || $resize == true)
			{
				$this->autoresize($file_name, $config['upload_path'], $upload_path, $upload_folder);
			}
		}
		else
		{
			//IF NOT UPLOADED
			$file_name = DEFAULT_IMAGE_NAME;
		}

		return $file_name;
	}

	public function update_image($file, $upload_path, $resize = null, $upload_folder)
	{
		if($_FILES[$file]['tmp_name'] != null)
		{
			//Check if Old Image Exist
			if($this->data[$file] != NULL)
			{
				$this->delete_image($this->data[$file], $upload_path, $resize, $upload_folder);
			}

			$this->data[$file] = $this->upload_image($file, $upload_path, $resize, $upload_folder);
		}
		else
		{
			//Use Old Image
			$this->data[$file] = $this->data[$file];
		}

		return $this->data[$file];
	}

    public function delete_image($file_name, $upload_path, $resize = null, $upload_folder)
	{
		if($upload_folder == null){
			$folder = $this->router->fetch_class();
		}else{
			$folder = $upload_folder;
		}
		unlink('./'.ASSETS_UPLOADS_URL . $folder . '/original/' . $upload_path . '/' . $file_name);

		if($resize == null || $resize == true)
		{
			unlink('./'.ASSETS_UPLOADS_URL . $folder . '/resized/' . $upload_path . '/' . $file_name);
		}
	}

	public function delete_child_image($file_name, $child_name, $upload_path, $resize = null)
	{
		unlink('./'.ASSETS_UPLOADS_URL . $child_name . '/original/' . $upload_path . '/' . $file_name);

		if($resize == null || $resize == true)
		{
			unlink('./'.ASSETS_UPLOADS_URL . $child_name . '/resized/' . $upload_path . '/' . $file_name);
		}
	}

	// New Code Added at 27 January 2017 - START
	public function upload_file($file, $upload_path, $extension = null)
	{
		if($extension == null)
		{
			$extension = 'doc|docx|pdf';
		}

		//Upload Thumbnail
		$config['upload_path'] = './' . ASSETS_UPLOADS_URL . $this->router->fetch_class() . '/original/' . $upload_path . '/';
		$config['allowed_types'] = $extension;
		//$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);

		if($this->upload->do_upload($file))
		{
			$upload = $this->upload->data();
			$file_name = $upload['file_name'];
		}else{
			var_dump($this->upload->display_errors());die;
		}

		return $file_name;
	}

	public function update_file($file, $upload_path, $extension = null)
	{
		if($_FILES[$file]['tmp_name'] != null)
		{
			//Check if Old File Exist
			if($this->data[$file] != NULL)
			{
				$this->delete_file($this->data[$file], $upload_path);
			}

			$this->data[$file] = $this->upload_file($file, $upload_path, $extension);
		}
		else
		{
			//Use Old File
			$this->data[$file] = $this->data[$file];
		}

		return $this->data[$file];
	}

	public function delete_file($file_name, $upload_path)
	{
		unlink('./'.ASSETS_UPLOADS_URL . $this->router->fetch_class() . '/original/' . $upload_path . '/' . $file_name);
	}

	// New Code Added at 27 January 2017 - END

	public function autoresize($file_name, $original_path, $upload_path, $upload_folder, $width = null, $height = null, $maintain_ratio = null)
	{
		if($upload_folder == null){
			$folder = $this->router->fetch_class();
		}else{
			$folder = $upload_folder;
		}

		$config_manip['image_library'] = 'gd2';
		$config_manip['source_image'] = $original_path . $file_name;
		$config_manip['new_image'] = './' . ASSETS_UPLOADS_URL . $folder .'/resized/'.$upload_path.'/' . $file_name;
		$config_manip['encrypt_name'] = FALSE;

		if($maintain_ratio == null || $maintain_ratio == true)
		{
			$config_manip['maintain_ratio'] = TRUE;
		}
		else
		{
			$config_manip['maintain_ratio'] = FALSE;
		}

		if($width != null)
		{
			$config_manip['width'] = $width;
		}
		if($height != null)
		{
			$config_manip['height'] = $height;
		}

		$this->image_lib->initialize($config_manip);
		$this->image_lib->resize();
	}

	//New Code Added at 31 Maret 2017 - START

	public function check_image_upload($file, $upload_path, $resize, $upload_folder)
	{
		if(!empty($_FILES[$file]['name']))
		{
			//If image not null, upload image to Server
			return $this->upload_image($file, $upload_path, $resize, $upload_folder);
		}
		else
		{
			//Set Default Image
			return DEFAULT_IMAGE_NAME;
		}
	}

	public function check_image($file, $upload_path, $form_status ,$resize = null, $upload_folder = null)
	{
		if($form_status == null) // Add Form
		{
			return $this->check_image_upload($file, $upload_path, $resize, $upload_folder);
		}
		else if($form_status != null) // Edit Form
		{
			if($this->data[$file] == DEFAULT_IMAGE_NAME || $this->data[$file] == null)
			{
				//If edit_form has defaulr_image or null, than do normal upload with check image
				return $this->check_image_upload($file, $upload_path, $resize, $upload_folder);
			}
			else
			{
				//else, do update image
				return $this->update_image($file, $upload_path, $resize, $upload_folder);
			}
		}

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
            redirect(ADMIN_URL . ADMIN_URL_CALCULATION);
        }
    }
}

class UNIPublic_Controller extends UNI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->set_masterpage('page');
	}
}

?>