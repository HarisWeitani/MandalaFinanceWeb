<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detail_interest extends CI_Model {
    public function getById($id){
        $this->db->where('dt_interest_id', $id);
        $this->db->where('is_deleted', 0);
        return $this->db->get("dt_interest");
    }

    public function getAll() {
        $this->db->where('is_deleted', 0);
        $this->db->where('`dt_interest_id` IN (SELECT `interest_id` FROM `ms_calculation`)', NULL, FALSE);

        return $this->db->get("dt_interest");
    }

    public function countTable() {
        $select =   array(
            'count(dt_interest.dt_interest_id) as total'
        );  
        return $this->db->select($select)
        ->from('dt_interest')
        ->group_by('dt_interest.dt_interest_id')
        ->get();
    }

    public function getDistinctMonth()
    {
        $select =   array(
            'distinct(dt_interest_name)'
        );  
        return $this->db->select($select)
        ->from('dt_interest')
        ->get();
    }

    public function insert_batch($dataSet)
    {
        $this->db->insert_batch('dt_interest', $dataSet);
    }

    public function update_batch($dataSet)
    {
        $this->db->update_batch('dt_interest', $dataSet, "dt_interest_name");
    }

}
?>