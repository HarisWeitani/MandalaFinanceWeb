<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {
	private $CI;
	private $masterpage;
	private $page_title;
	private $meta_page_title;
	private $meta_page_description;
	private $meta_page_author;
	private $view_data;
	
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function set_masterpage($masterpage) {
		$this->masterpage = $masterpage;
	}
	
	public function set_title($title = '') {
		$this->page_title = $title;
	}
	
	public function set_meta_page($meta_page_title = '', $meta_page_description = '', $meta_page_author = '') {
		$this->meta_page_title = $meta_page_title;
		$this->meta_page_description = $meta_page_description;
		$this->meta_page_author = $meta_page_author;
	}
	
	public function set_data(&$data) {
		$this->view_data =& $data;
	}
	
	public function view($view) {
		$data = array();
		$data['meta_page_title'] = $this->meta_page_title;
		$data['meta_page_description'] = $this->meta_page_description;
		$data['meta_page_author'] = $this->meta_page_author;
		
		$data['page_title'] = $this->page_title;
		$data['side_bar_menu'] = $this->CI->load->view(ADMIN_URL.'side_bar_menu',null,TRUE);
		$data['content'] = $this->CI->load->view($view,$this->view_data,TRUE);
		
		$this->CI->load->view($this->masterpage,$data);
	}

	public function mobile_view($view) {
		$data = array();
		$data['page_title'] = $this->page_title;
		$data['content'] = $this->CI->load->view($view,$this->view_data,TRUE);
		
		$this->CI->load->view('mobile_page',$data);
	}
}