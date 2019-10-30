<?php
class Model_administrator extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getDataById($id)
	{
        $this->db->where("admin_id", $id);
        return $this->db->get("ms_admin");
	}

	public function updateData($post)
	{
		$date = date('Y-m-d H:i:s');

		$data = array(
			'admin_password' => md5($post['admin_password']),
			'updated_date' => $date,
			'updated_by' => $this->session->userdata('admin_id')
		);

		$this->db->where('admin_id', $post['admin_id']);
		$this->db->update('ms_admin', $data);
	}
}
?>