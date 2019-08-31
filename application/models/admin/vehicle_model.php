<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vehicle_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	public function getVehicleModels()
	{
		$this->db->select('*');
		$this->db->from('VehicleModelYear');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getVehicleModel($id){
		$this->db->select('*');
		$this->db->from('VehicleModelYear');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	public function insertVehicle($data){
		return $this->db->insert('VehicleModelYear',$data);
	}
	public function insertVehicleBatch($data){
		return $this->db->insert_batch('VehicleModelYear', $data);
	}
	public function updateVehicle($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('VehicleModelYear',$data);
	}
	public function deleteVehicle($id){
		$this->db->where('id', $id);
		return $this->db->delete('VehicleModelYear');
	}
	public function getVehicleYears(){
		$this->db->distinct();
		$this->db->select('year');
		$this->db->from('VehicleModelYear');
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getVehicleMake($year){
		$this->db->distinct();
		$this->db->select('make');
		$this->db->from('VehicleModelYear');
		if(!empty($year)){
			$this->db->where('year',$year);
		}
		$this->db->order_by('year','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getVehicles($year){
		$this->db->select('make,model');
		$this->db->from('VehicleModelYear');
		$this->db->where('year',$year);
		$query = $this->db->get();
		return $query->result();
	}
	public function getVehicleMakeModel($year,$make){
		$this->db->select('model');
		$this->db->from('VehicleModelYear');
		$this->db->where('year',$year);
		$this->db->where('make',$make);
		$this->db->order_by('year','desc');
		$query = $this->db->get();
		return $query->result();
	}
}
?>