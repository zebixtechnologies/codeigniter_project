<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: vaibhav
 * Description: Home model class
 */
class staticblock_model extends CI_Model
{
    function __construct()
	{
        parent::__construct();
    }

	public function getStaticBlock($pageid)
			{
				$this->db->select('pagename,pagedescription,pagetitle,metaname,metadescription,pageid');
				$this->db->from('static_page');
				$this->db->where('pageid',$pageid);
				$query = $this->db->get();
				return $query->result();
			}
	
	public function updateStaticBlock()
			{//echo $edit_id;
			//print_r($_REQUEST);
		
				$privacy['pagename']		= 	addslashes($this->security->xss_clean($this->input->post('PageName')));
				$privacy['pagedescription']		= 	urldecode (str_replace(base_url(),"[baseurl]", $this->input->post('pagedescription')));
				$privacy['pagetitle']		= 	addslashes($this->security->xss_clean($this->input->post('pagetitle')));
				$privacy['metaname']	= 	addslashes($this->security->xss_clean($this->input->post('metaname')));
				$privacy['metadescription']				= addslashes($this->security->xss_clean($this->input->post('metadescription')));
				$privacy['lastupdated']			= 	time();
				$edit_id							= 	addslashes($this->security->xss_clean($this->input->post('edit_id')));
				$this->db->where('pageid',$edit_id);
				return ($this->db->update('static_page',$privacy)) ? TRUE:FALSE;
			}

	


}
?>