<?php
	defined("BASEPATH") OR exit("No direct script access allowed");

	class Calculation extends UNIAdmin_Controller {

		//constructor
		public function __construct() {
			parent::__construct();
			$this->load->Model("Model_calculation");
			$this->load->Model("Model_detail_interest");

			$this->menu_title = "Calculation";
		}

		//check
		private function set_header(){
			$this->layout->set_title($this->menu_title);
			$this->data["message"] = $this->session->flashdata("message");
			$this->data["error"] = $this->session->flashdata("error");
		}

		//view
		public function index() {

			$this->set_header();
			$listCalculation = $this->Model_calculation->getAll()->result();
			
			foreach($listCalculation as $key => $obj)
			{
				$listCalculation[$key]->interests = $this->Model_detail_interest->getById($obj->interest_id)->result();
			}
			$this->data['list_calculation'] = $listCalculation;
			$count = $this->Model_detail_interest->countTable()->result();
			$maxCount = max($count);
			$this->data['countMonth'] = $maxCount->total + 1; 
			$this->data['tempMonth'] = $maxCount->total;
			$this->data['list_month'] = $this->Model_detail_interest->getDistinctMonth()->result();
			
			$this->data['count'] = 0;
			// $this->data['list_interest'] = $this->Model_detail_interest->getAll()->result(); 
			$this->layout->view(ADMIN_URL.$this->router->fetch_class()."/view");
		}

		//form
		public function form($id = null) {
			$this->set_header();
			$date = date("Y-m-d H:i:s");

			// Add Data
			if($id == null)
			{
				if(empty($data))
				{
					$this->data["vehicle_type_name"] = null;// 2
					$this->data["vehicle_age"] = null;
					$this->data["dt_interest_5Year"] = null;
					$this->data["dt_interest_10Year"] = null;
					$this->data["dt_interest_15Year"] = null;
					$this->data["totalCount"] = null;
				}
			}

			// Edit Data
			else
			{
				$this->data["content"] = $this->db
					->where("calculation_id", $id)
					->get("ms_calculation");

				if($this->data["content"]->num_rows() <= 0)
				{
					$this->session->set_flashdata("error", "Content Not Found");
					redirect(ADMIN_URL.$this->router->fetch_class());
				}

				$content = $this->data["content"]->row();

				$this->data["vehicle_type_id"] = $id; // 1 [PK]
				$this->data["vehicle_type_name"] = $content->vehicle_type_name;// 2
				$this->data["vehicle_age"] = $content->vehicle_age;

				

				//id untuk 5 - 10 tahun
				$id10Year = $id + 1;
				//id untuk 10 - 15 tahun
				$id15Year = $id10Year + 1;

				$this->data["dt_interest_5Year"] = $id;
				$this->data["dt_interest_10Year"] = $id10Year;
				$this->data["dt_interest_15Year"] = $id15Year;

				$listId = array($id, $id10Year, $id15Year);
				$list_dt_interest_5Year = $this->db->where("dt_interest_id", $id)->order_by("dt_interest_id", "ASC")->get("dt_interest")->result();
				$list_dt_interest_10Year = $this->db->where("dt_interest_id", $id10Year)->order_by("dt_interest_id", "ASC")->get("dt_interest")->result();
				$list_dt_interest_15Year = $this->db->where("dt_interest_id", $id15Year)->order_by("dt_interest_id", "ASC")->get("dt_interest")->result();
				$this->data["totalCount"] = $this->db->select("count(dt_interest_id) as totalCount")->from("dt_interest")->where("dt_interest_id", $id)->get()->row()->totalCount;
				
				$this->data["list_dt_interest_5Year"] = $list_dt_interest_5Year;
				$this->data["list_dt_interest_10Year"] = $list_dt_interest_10Year;
				$this->data["list_dt_interest_15Year"] = $list_dt_interest_15Year;
			}

			if($_POST)
			{
				$this->data["vehicle_type_name"] = $this->input->post("vehicle_type_name");
				
				$interests5Year = $this->input->post('interests5Year');
				$interests10Year = $this->input->post('interests10Year');
				$interests15Year = $this->input->post('interests15Year');

				$multiplier = 12;

				$this->form_validation->set_rules("vehicle_type_name","Vehicle Type Name","required");

				if($this->form_validation->run())
				{
					//Untuk Insert
					if($id == null)
					{
						$this->data["created_by"] = $this->session->userdata('admin_id');
						$this->data["vehicle_age"] = "< 5 Tahun";
						$this->Model_calculation->create($this->data);
						$id5Year = $this->db->insert_id();

						$this->data["vehicle_age"] = "5 - 10 Tahun";
						$this->Model_calculation->create($this->data);
						$id10Year = $this->db->insert_id();

						$this->data["vehicle_age"] = "11 - 15 Tahun";
						$this->Model_calculation->create($this->data);
						$id15Year = $this->db->insert_id();

						$count = $this->db->query("SELECT count(distinct(dt_interest_name)) as count FROM dt_interest")->row()->count;
						$j = 0;

						for($i = 0 ; $i < sizeof($interests5Year); $i++)
						{
							$j = $j + 1;
							$tmp = ($multiplier * $j) . ' Bulan';
							$dataSet5Year[$i] = array('dt_interest_name' => $tmp, 'dt_interest_value' => $interests5Year[$i], 'dt_interest_id' => $id5Year,
							 'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
							$dataSet10Year[$i] = array('dt_interest_name' => $tmp, 'dt_interest_value' => $interests10Year[$i], 'dt_interest_id' => $id10Year,
							 'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
							$dataSet15Year[$i] = array('dt_interest_name' => $tmp, 'dt_interest_value' => $interests15Year[$i], 'dt_interest_id' => $id15Year,
							 'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
						}
						
						//Ini ketika, isi di databasenya 4 tapi yang diinsert adalah 2
						if($count > sizeof($interests5Year))
						{
							$initValue = sizeof($interests5Year);
							for($j = sizeof($interests5Year); $j < $count; $j++)
							{
								$initValue = $initValue + 1;
								$tmp = ($multiplier * $initValue) . ' Bulan';
								$dataSet5Year[] = array('dt_interest_name' => $tmp, 'dt_interest_value' => 0, 'dt_interest_id' => $id5Year, 
								'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
								$dataSet10Year[] = array('dt_interest_name' => $tmp, 'dt_interest_value' => 0, 'dt_interest_id' => $id10Year, 
								'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
								$dataSet15Year[] = array('dt_interest_name' => $tmp, 'dt_interest_value' => 0, 'dt_interest_id' => $id15Year, 
								'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date);
							}
						}
						//Ini ketika, isi di databasenya 4 tapi yang diinsert adalah 5
						else if($count < sizeof($interests5Year))
						{
							
							//Insert semua dengan value 0
							$initValue = $count;
							for($h = $count; $h < sizeof($interests5Year); $h++)
							{
								$g = $initValue + 1;
								$tmp = ($multiplier * $g) . ' Bulan';
								$sql = "SELECT distinct(dt_interest_id), ? as dt_interest_name, 0 as dt_interest_value, ? as created_date FROM dt_interest WHERE dt_interest_id NOT IN(SELECT dt_interest_id FROM dt_interest WHERE dt_interest_name = ?)";
								$dataSet = $this->db->query($sql, array($tmp, $date, $tmp))->result();
								$this->Model_detail_interest->insert_batch($dataSet);
							}

							//Ini buat insert semuanya
							for($j = sizeof($interests5Year); $j < $count; $j++)
							{
								$g = $initValue + 1;
								$tmp = ($multiplier * $g) . ' Bulan';
								$dataSet5Year[$j] = array('dt_interest_name' => $tmp, 'dt_interest_value' => $interests5Year[$j], 'dt_interest_id' => $id5Year, 
								'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
								$dataSet10Year[$j] = array('dt_interest_name' => $tmp, 'dt_interest_value' => $interests10Year[$j], 'dt_interest_id' => $id10Year, 
								'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
								$dataSet15Year[$j] = array('dt_interest_name' => $tmp, 'dt_interest_value' => $interests15Year[$j], 'dt_interest_id' => $id15Year, 
								'created_by' => $this->session->userdata('admin_id'), 'created_date' => $date );
							}
							
						}
						
						$this->Model_calculation->updateInterestId($id5Year);
						$this->Model_calculation->updateInterestId($id10Year);
						$this->Model_calculation->updateInterestId($id15Year);
						
						$this->Model_detail_interest->insert_batch($dataSet5Year);
						$this->Model_detail_interest->insert_batch($dataSet10Year);
						$this->Model_detail_interest->insert_batch($dataSet15Year);

						$this->session->set_flashdata("message", "Successfully Add New Data");
						redirect(ADMIN_URL.$this->router->fetch_class().'/');
					}
					//Untuk Update
					else
					{
						//Id untuk 0 - 5 Year
						$id5Year = $id;
						//Id untuk 5 - 10 Year
						$id10Year = $id + 1;
						//Id untuk 10 - 15 Year
						$id15Year = $id10Year + 1;
						
						$ids = array($id, $id10Year, $id15Year);
						$this->Model_calculation->update($ids, $this->data);
						
						$count = $this->db->query("SELECT count(distinct(dt_interest_name)) as count FROM dt_interest")->row()->count;
						$j = 0;

						for($i = 0 ; $i < sizeof($interests5Year); $i++)
						{
							$j = $j + 1;
							$tmp = ($multiplier * $j) . ' Bulan';
							$data5Year = array("dt_interest_value" => $interests5Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') );
							$data10Year = array("dt_interest_value" => $interests10Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') ); 
							$data15Year = array("dt_interest_value" => $interests15Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') );
							$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id5Year)->update("dt_interest", $data5Year);
							$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id10Year)->update("dt_interest", $data10Year);
							$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id15Year)->update("dt_interest", $data15Year);
						}
						$newInterests5Year = $this->input->post('newInterests5Year');
						$newInterests10Year = $this->input->post('newInterests10Year');
						$newInterests15Year = $this->input->post('newInterests15Year');

						$totalInserted = sizeof($interests5Year) + sizeof($newInterests5Year);
						//Ini ketika, isi di databasenya 4 tapi yang diinsert adalah 5
						if($count < $totalInserted)
						{
							
							$initValue = $count;
							
							//Insert semua dengan value 0
							for($h = $count; $h < $totalInserted; $h++)
							{
								$g = $initValue + 1;
								$tmp = ($multiplier * $g) . ' Bulan';
								$sql = "SELECT distinct(dt_interest_id), ? as dt_interest_name, 0 as dt_interest_value, ? as created_date FROM dt_interest WHERE dt_interest_id NOT IN(SELECT dt_interest_id FROM dt_interest WHERE dt_interest_name = ?)";
								$dataSet = $this->db->query($sql, array($tmp, $date, $tmp))->result();
								$this->Model_detail_interest->insert_batch($dataSet);
							}

							for($i = 0; $i <  sizeof($newInterests5Year); $i++)
							{
								$data5Year = array("dt_interest_value" => $newInterests5Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') );
								$data10Year = array("dt_interest_value" => $newInterests10Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') ); 
								$data15Year = array("dt_interest_value" => $newInterests15Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') );
								$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id5Year)->update("dt_interest", $data5Year);
								$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id10Year)->update("dt_interest", $data10Year);
								$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id15Year)->update("dt_interest", $data15Year);
							}

							//Ini buat insert semuanya
							for($j = $totalInserted; $j < $count; $j++)
							{
								$g = $initValue + 1;
								$tmp = ($multiplier * $g) . ' Bulan';
								$data5Year = array("dt_interest_value" => $interests5Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') );
								$data10Year = array("dt_interest_value" => $interests10Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') ); 
								$data15Year = array("dt_interest_value" => $interests15Year[$i], "updated_date" => $date, "updated_by" => $this->session->userdata('admin_id') );
								$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id5Year)->update("dt_interest", $data5Year);
								$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id10Year)->update("dt_interest", $data10Year);
								$this->db->where("dt_interest_name", $tmp)->where("dt_interest_id", $id15Year)->update("dt_interest", $data15Year);
							}

						}


						$this->session->set_flashdata("message", "Successfully Update Data");
						redirect(ADMIN_URL.$this->router->fetch_class().'/');
					}
				}
			}

			$this->layout->view(ADMIN_URL.$this->router->fetch_class()."/form");
		}

		public function delete() {
			$id = $_REQUEST["modal"];

			$this->db->trans_start();
			$this->Model_calculation->delete($id);
			$this->db->trans_complete();

			$this->session->set_flashdata("message", "Successfully Delete Data");
			redirect(ADMIN_URL.$this->router->fetch_class().'/');
		}

	}
?>