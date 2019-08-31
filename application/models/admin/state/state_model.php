<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
 
class state_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
  
    public function getallstate(){
        $this->db->select('s.*,c.name as countryName');
        $this->db->from('state s');
        $this->db->join('country c','c.countryId=s.countryId');
		$query = $this->db->get();
		return $query->result();
    }
	public function getcountry(){
        $this->db->select('*');
		$this->db->where('isActive',1);
		$query = $this->db->get('country');
		return $query->result();
    }
	public function getstate($Id){
        $this->db->select('*');
		$this->db->where('stateId',$Id);
		$query = $this->db->get('state');
		return $query->result();
    }
	public function getallcategary(){
        $this->db->select('c.*,c_dup.categoryName as parentName');
		$this->db->from('categories c');
		$this->db->group_by('categoryId');
		$this->db->join('categories c_dup','c_dup.categoryId=c.parentCategory','left outer');
		$query = $this->db->get();
		return $query->result();
    }
	public function deleteState($catId){
		$this->db->where('stateId',$catId);
		return($this->db->delete('state')) ? true:false;
    }
	
	public function insertNewState(){
		$state_name 		= strtolower($this->security->xss_clean($this->input->post('state_name')));
		$state_val 	= $this->security->xss_clean($this->input->post('state_val'));
		$country 	= $this->security->xss_clean($this->input->post('country'));
		$isActive 			= $this->security->xss_clean($this->input->post('isActive'));
		$this->db->select('*');
		$this->db->where('stateName',$state_name);
		$this->db->where('countryId',$country);
		$query = $this->db->get('state');
		if($query->num_rows > 0){
			return false; // 2 for duplicate entry
		}else{
			
			$cat['stateName'] 		= $state_name;
			$cat['stateValue'] 		= $state_val;
			$cat['countryId'] 		= $country;
			$cat['isActive']		= $isActive;
			$this->db->insert('state',$cat);
			return true;
		}
	}
	public function updateState(){
		$state_name 		= strtolower($this->security->xss_clean($this->input->post('state_name')));
		$state_val 	= $this->security->xss_clean($this->input->post('state_val'));
		$country 	= $this->security->xss_clean($this->input->post('country'));
		$isActive 			= $this->security->xss_clean($this->input->post('isActive'));
		$editId 			= $this->security->xss_clean($this->input->post('editId'));
		$this->db->select('*');
		$this->db->where('stateName',$state_name);
		$this->db->where('countryId',$country);
		$this->db->where('stateId !=', $editId );
		$query = $this->db->get('state');
		if($query->num_rows > 0){
			return false; // 2 for duplicate entry
		}else{
		$cat['stateName'] 		= $state_name;
		$cat['stateValue'] 		= $state_val;
		$cat['countryId'] 		= $country;
		$cat['isActive']	= $isActive;
		$this->db->where('stateId',$editId);
		$this->db->update('state',$cat);
		return true;
		}
	}
}
?>