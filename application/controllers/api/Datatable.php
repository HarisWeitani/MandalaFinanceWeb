<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends UNIAdmin_Controller {
	//check
	public function __construct() {
		parent::__construct();

		$this->table_name = "";
		$this->columns = array();
		$this->columns_order_by = array();
		$this->post_parameter = array();
		$this->custom_query = false;
		$this->additional_where = null;

	}

	public function make_where(){
		if($this->table_name == 'ms_calculation')
		{
			$this->db->join('dt_interest', 'dt_interest.dt_interest_id = ms_calculation.interest_id', 'left');
		}

	}

	public function server_side($table_name, $additional_where = null)
    {
    	if($additional_where != null){
    		$this->additional_where = $additional_where;
    	}

    	$this->table_name = $table_name;
    	$this->post_parameter = $_POST;
        
		if($table_name == 'ms_calculation')
		{	
			$this->columns = array('calculation_id','vehicle_type_name', 'vehicle_age', 'interest_id', 'ms_calculation.is_deleted');
			$this->db->select("calculation_id, vehicle_type_name, vehicle_age, interest_id, ms_calculation.is_deleted, dt_interest_name, dt_interest_value", false);

			$this->custom_query = true;
			
			$fetch_data = $this->make_datatable();
			$data = array();

			foreach($fetch_data as $row)
			{	
                if($row->is_deleted == 0)
                {
                    $sub_array = array();
                    
                    $sub_array[] = $row->vehicle_type_name;
                    $sub_array[] = $row->vehicle_age;
                    $sub_array[] = $row->dt_interest_name;
                    $sub_array[] = '<a href="'. base_url() . ADMIN_URL . ADMIN_URL_CALCULATION .'form/'. $row->calculation_id.'" class="btn btn-info margin-inline" style="margin-right: 5px;">Edit</a>
                    <button type="button" class="open-deleteModal btn btn-danger margin-inline" data-toggle="modal" data-id="'.$row->calculation_id.'" data-target="#deleteModal">Delete</button>
                    ';

                    $data[] = $sub_array;
                }
			}
		}
		else
		{
    		$this->columns = $this->db->list_fields($table_name);

    		$fetch_data = $this->make_datatable();
	    	$data = array();

	    	foreach($fetch_data as $row){
	    		$sub_array = array();

	    		// Loop through all columns
				foreach ($row as $key => $value)
				{
					$sub_array[] = $value;
				}

	    		$data[] = $sub_array;
	    	}
    	}

    	$output = array(
    		"draw" => intval($this->post_parameter['draw']),
    		"recordsTotal" => $this->get_all_data(),
    		"recordsFiltered" => $this->get_filtered_data(),
    		"data" => $data
    	);

    	echo json_encode($output);
    }

	private function make_query(){
		
			if(!empty($this->columns)){
				$select = "";
				foreach($this->columns as $column){
					$select .= $column . ", ";
				}
				$this->db->select(substr($select, 0, -2));
			}
			else{
				$this->db->select("*");
			}

			
			$this->db->from($this->table_name);
			
	}

	public function make_filter(){
		if(isset($this->post_parameter['search']['value'])){
			$search = $this->post_parameter['search']['value'];
			$like = "";

			foreach($this->columns as $column){
				$like .= $column . " LIKE '%{$search}%' OR ";
			}

			$like = substr($like, 0, -3);

			if($like != ""){
				$this->db->where('('.$like.')', null, false);
			}
		}

		if(isset($this->post_parameter['order'])){
			$this->db->order_by($this->columns[$this->post_parameter['order']['0']['column']], $this->post_parameter['order']['0']['dir']);
		}else{
			$this->db->order_by($this->columns[0], "DESC");
		}
	}

	public function make_datatable(){
		$this->make_query();
		$this->make_where();
		$this->make_filter();
		if($this->post_parameter['length'] != -1){
			$this->db->limit($this->post_parameter['length'], $this->post_parameter['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_data(){
		$this->make_query();
		$this->make_where();
		$this->make_filter();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data(){
		$this->make_query();
		$this->make_where();
		$query = $this->db->get();
		return $query->num_rows();
	}
}
?>