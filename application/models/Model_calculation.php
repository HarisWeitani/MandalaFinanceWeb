<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_calculation extends CI_Model {
    public function getById($id){
        $this->db->where('calculation_id', $id);
        $this->db->where('is_deleted', 0);
        return $this->db->get("ms_calculation");
    }

    public function getAll() {
        $this->db->where('is_deleted', 0);
        return $this->db->get("ms_calculation");
    }

    public function get() {
        $this->db->join('dt_interest', 'dt_interest.dt_interest_id = ms_calculation.interest_id', 'left');
        $this->db->where('is_deleted', 0);
        
        return $this->db->get("ms_calculation");
    }

    public function create($calculation) {
        $date = date("Y-m-d H:i:s");

        $data = array(
            "vehicle_type_name" => $calculation["vehicle_type_name"],
            "vehicle_age" => $calculation["vehicle_age"],
            "is_deleted" => 0,
            "created_date" => $date,
            "created_by" =>  $calculation["created_by"]

        );
        $this->db->insert("ms_calculation", $data);

        
    }

    public function updateInterestId($id)
    {
        $newData = array(
            'interest_id' => $id
        );

        $this->db->where('calculation_id', $id);
        $this->db->update('ms_calculation', $newData);
    }

    public function update($ids, $calculation) {
        $date = date("Y-m-d H:i:s");

        $data = array(
            "vehicle_type_name" => $calculation["vehicle_type_name"],
            "updated_date" => $date
        );
        $this->db->where_in("calculation_id", $ids);
        $this->db->update("ms_calculation", $data);
    }

    public function delete($id) {
        $data = array(
            "is_deleted" => 1
        );

        $this->db->where("calculation_id", $id);        
        $this->db->update("ms_calculation", $data);

        $this->db->where('dt_interest_id', $id);
        $this->db->update('dt_interest', $data);

        //Update 5 - 10 Calculation
        $id10Year = $id + 1;
        $this->db->where("calculation_id", $id10Year);        
        $this->db->update("ms_calculation", $data);

        $this->db->where('dt_interest_id', $id10Year);
        $this->db->update('dt_interest', $data);

        //Update 10 - 15 Year Calculation
        $id15Year = $id10Year + 1;
        $this->db->where("calculation_id", $id15Year);        
        $this->db->update("ms_calculation", $data);

        $this->db->where('dt_interest_id', $id15Year);
        $this->db->update('dt_interest', $data);

    }

}
?>