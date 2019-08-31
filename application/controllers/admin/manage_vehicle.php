<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
 session_start();//we need to call PHP's session object to access it through CI
class manage_vehicle extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('admin/vehicle_model');
	 }

	 public function index()
	 {
	  if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['vehicles'] = $this->vehicle_model->getVehicleModels();
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/manage_vehicle');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function add_vehicle(){
		 if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			if($this->input->server('REQUEST_METHOD') == 'POST'){
				$year	 = $this->security->xss_clean($this->input->post('year'));
				$make	 = $this->security->xss_clean($this->input->post('make'));
				$model	 = $this->security->xss_clean($this->input->post('model'));
				$insertData = array(
					'year' => $year,
					'make' => $make,
					'model' => $model
				);
				$this->vehicle_model->insertVehicle($insertData);
				redirect('admin/manage_vehicle', 'refresh');
			}
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/add_vehicle');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function duplicate_vehicle(){
		 if($this->session->userdata('logged_in'))
		{
			$user_data 		 = $this->session->userdata('logged_in');
			$data['user'] 	 = $user_data;
			$data['years'] = $this->vehicle_model->getVehicleYears();
			if($this->input->server('REQUEST_METHOD') == 'POST'){
				$duplicateyear	 = $this->security->xss_clean($this->input->post('duplicateyear'));
				$year	 = $this->security->xss_clean($this->input->post('year'));
				$vehicles =  $this->vehicle_model->getVehicles($duplicateyear);
				$insertArray = array();
				if(isset($vehicles) && !empty($vehicles)){
					foreach($vehicles as $vehicle){
						$insertArray[] = array(
							'year' => $year,
							'make' => $vehicle->make,
							'model' => $vehicle->model
						);
					}
				}
				$this->vehicle_model->insertVehicleBatch($insertArray);
				redirect('admin/manage_vehicle', 'refresh');
			}
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/duplicate_vehicle');
			$this->load->view('admin/home_footer');
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function edit($id){
		if($this->session->userdata('logged_in'))
		{
			if(isset($id) && $id >0){
				$user_data 		 = $this->session->userdata('logged_in');
				$data['user'] 	 = $user_data;
				if($this->input->server('REQUEST_METHOD') == 'POST'){
					$year	 = $this->security->xss_clean($this->input->post('year'));
					$make	 = $this->security->xss_clean($this->input->post('make'));
					$model	 = $this->security->xss_clean($this->input->post('model'));
					$updateData = array(
						'year' => $year,
						'make' => $make,
						'model' => $model
					);
					$this->vehicle_model->updateVehicle($updateData,$id);
					redirect('admin/manage_vehicle', 'refresh');
				}
				$data['vehicle'] = $this->vehicle_model->getVehicleModel($id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/edit_vehicle');
				$this->load->view('admin/home_footer');
			}else{
				redirect('admin/login', 'refresh');
			}
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function deleteVehicle($id){
		 if($this->session->userdata('logged_in'))
		{
			if(isset($id) && $id >0){
				$this->vehicle_model->deleteVehicle($id);
				redirect('admin/manage_vehicle', 'refresh');
			}else{
				redirect('admin/login', 'refresh');
			}
		}
	   else
	   {
			redirect('admin/login', 'refresh');
	   }
	 }
	 public function getVehicleMake($year=''){
		 $makes =  $this->vehicle_model->getVehicleMake($year);
		 echo json_encode($makes);
	 }
	 public function getVehicleModel($year,$make){
		 $makes =  $this->vehicle_model->getVehicleMakeModel($year,$make);
		 echo json_encode($makes);
	 }
}
?>