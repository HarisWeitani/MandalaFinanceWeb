<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculation extends UNIPublic_Controller {
	//check
	public function __construct() {
		parent::__construct();
				// Allow from any origin
	    if (isset($_SERVER['HTTP_ORIGIN'])) {
	        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
	        // you want to allow, and if so:
	        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	        header('Access-Control-Allow-Credentials: true');
	        header('Access-Control-Max-Age: 86400');    // cache for 1 day
	    }

	    // Access-Control headers are received during OPTIONS requests
	    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

	        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
	            // may also be using PUT, PATCH, HEAD etc
	            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

	        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
	            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

	        exit(0);
	    }
        header('Content-Type: application/json');
		
	}

    public function get_all()
    {
        $calculations = $this->db->join('dt_interest', 'dt_interest.dt_interest_id = ms_calculation.interest_id', 'left')
        ->get('ms_calculation');

        $data = array();

        if($calculations->num_rows() > 0)
        {
            $result = $calculations->result();

            foreach($result as $res)
            {
                $data[] = $res;
            }
            
            $return = array('status' => "Success", 'message' => "Success Get All Calculation", 'data' => $data);
        }
        else
        {
            $return = array('status' => "Failed", 'message' => 'No calculation data recorded', 'data' => $data);
        }

        echo json_encode($return);

    }


}
?>

