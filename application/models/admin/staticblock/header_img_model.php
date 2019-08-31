<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: vaibhav
 * Description: Home model class
 */
class header_img_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	
			public function imageUpdate($image)
		{
					
			$img['image_name'] = $image;
			$this->db->where('id',1);
			$this->db->update('mob_header_data',$img);		
		}
		
	public function getIndustryInfo()
		{//print_r($_REQUEST); die();
		$this->db->select('*');
		$this->db->from('mob_header_data');
		$this->db->where('id',1);
		$query = $this->db->get();
		//print_r($query);
		return $query->result();

		}
	
	public function updateHeader()
		{//print_r($_REQUEST); die();
		 $HeaderInfo['metaName']	= 	$this->security->xss_clean($this->input->post('metaname'));
			$HeaderInfo['metaDescription']	= 	$this->security->xss_clean($this->input->post('metadescription'));
			$HeaderInfo['headerTitle']	= 	$this->security->xss_clean($this->input->post('headertitle'));
			$HeaderInfo['pageName']	= 	$this->security->xss_clean($this->input->post('pagename'));		
			$HeaderInfo['lastUpdated']	= 	time();	
			$this->db->where('id',1);
		$this->db->update('mob_header_data',$HeaderInfo);

		}
		
}
?>