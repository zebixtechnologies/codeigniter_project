<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: vaibhav
 * Description: Home model class
 */
class faqmanage_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }



//faq question use
//show questions
public function activeBlockDetails()
	{	
		$this->db->select('*');
		$this->db->from('mob_faq_question_info');
	$this->db->order_by('questionOrderKey');

		$query = $this->db->get();
		//print_r($query);
		return $query->result();
	} 
public function activeBlockGroup()
	{	
		$this->db->select('*');
		$this->db->from('mob_faq_question_info mf');
	$this->db->order_by('questionOrderKey');
	$this->db->join('mob_faq_page_info mi', 'mi.faqId = mf.blockId');
	$this->db->group_by('blockId');
		$query = $this->db->get();
		//print_r($query);
		return $query->result();
	} 
	public function blockWise($id)
	{	
		$this->db->select('*');
		$this->db->from('mob_faq_question_info');
	$this->db->order_by('questionOrderKey');
	$this->db->where('blockId',$id);
		$query = $this->db->get();
		//print_r($query);
		return $query->result();
	} 
	 	
	public function getFaqs($id)
	{	//used by both faq page and questions
		$this->db->select('*');
		$this->db->from('mob_faq_page_info');
		if($id !=0 ){
		$this->db->where('faqId',$id);
		}
		$this->db->order_by('lastUpdateDate','desc');
		$query = $this->db->get();
		//print_r($query);
		return $query->result();
	}
	//add questions
		public function add_new_que($current_user){
		// Insert menu   from form
		print_r($_REQUEST);
        $block['question'] 	= $this->security->xss_clean($this->input->post('question'));
        $block['answer'] 	=addslashes($this->input->post('answer'));
      	$block['blockId'] 	= $this->security->xss_clean($this->input->post('blockId'));
		
		$block['questionOrderKey']	= $this->security->xss_clean($this->input->post('questionOrderKey'));
		$block['isActive']= $this->security->xss_clean($this->input->post('isActive'));
		$block['created'] = time();
		$block['lastUpdateDate'] = time();
		return $this->db->insert('mob_faq_question_info', $block);
		
		}
		
	public function activePageDetails()
	{	
		$this->db->select('*');
		$this->db->from('mob_faq_page_info');
		$this->db->where('isActive',1);
		
		$this->db->order_by('faqId');
		$query = $this->db->get();
		//print_r($query);
		return $query->result();
	}  
		public function edit_que(){
		
        $question['question'] 	= $this->security->xss_clean($this->input->post('question'));
        $question['answer'] 	= $this->security->xss_clean($this->input->post('answer'));
        $question['blockId'] 	= $this->security->xss_clean($this->input->post('blockId'));
		$question['questionOrderKey']	= $this->security->xss_clean($this->input->post('questionOrderKey'));
		$question['isActive']= $this->security->xss_clean($this->input->post('isActive'));
			$question['lastUpdateDate'] = time();
		$edit_id = $this->security->xss_clean($this->input->post('edit_id'));
		$this->db->where('questionId', $edit_id);
		return $this->db->update('mob_faq_question_info',$question);
		}
		//delete questions
		public function remove_que($del_id)
		{
        // delete questions from Table
			$this->db->where('questionId', $del_id);
			return ($this->db->delete('mob_faq_question_info')) ? TRUE : FALSE;
		}
		//edit question
			public function GetBlock($edit_id)
		{
        // search page from Table
			$this->db->where('questionId', $edit_id);
			 $query = $this->db->get('mob_faq_question_info');
				//print_r($query);
				return $query->result();
		}
		public function updateQue()
		{//print_r($_REQUEST);
	$faq['question']		= 	$this->security->xss_clean($this->input->post('question'));
	$faq['answer']		= 	$this->security->xss_clean($this->input->post('answer'));
	
	$faq['questionOrderKey']	= 	$this->security->xss_clean($this->input->post('questionOrderKey'));

	$faq['isActive']				= 	$this->security->xss_clean($this->input->post('isActive'));
		$faq['blockId']		= 	$this->security->xss_clean($this->input->post('blockId'));
	$faq['lastUpdateDate']			= 	time();
	$edit_id							= 	$this->security->xss_clean($this->input->post('edit_id'));
	$this->db->where('questionId',$edit_id);
//echo $this->db->update('mob_faq_question_info',$faq);
	return ($this->db->update('mob_faq_question_info',$faq)) ? TRUE:FALSE;
		}
		
	


//faq page use



public function blockDetails()
	{	
		$this->db->select('*');
		$this->db->from('mob_faq_page_info');
		$this->db->order_by('lastUpdateDate','desc');
		$query = $this->db->get();
		//print_r($query);
		return $query->result();
	} 
	
	
	public function add_new_block($current_user){
		// Insert menu   from form
        $block['blockName'] 	= $this->security->xss_clean($this->input->post('blockName'));
	    $block['isActive'] 	= $this->security->xss_clean($this->input->post('isActive'));
		$block['orderKey']	= $this->security->xss_clean($this->input->post('orderKey'));
		$block['metaName']= $this->security->xss_clean($this->input->post('metaName'));
		$block['metaDescription']	= $this->security->xss_clean($this->input->post('metaDescription'));
		$block['pageTitle']= $this->security->xss_clean($this->input->post('pageTitle'));
		$block['created'] = time();
		$block['lastUpdateDate'] = time();
		return $this->db->insert('mob_faq_page_info', $block);
		
		}
		public function deletefaq($del_id)
		{
        // delete pack from Table
			$this->db->where('faqId', $del_id);
			return ($this->db->delete('mob_faq_page_info')) ? TRUE : FALSE;
		}

		
		public function updatefaq($user_id)
		{
	$faq['blockName']		= 	$this->security->xss_clean($this->input->post('blockName'));
	$faq['isActive']		= 	$this->security->xss_clean($this->input->post('isActive'));
	$faq['orderKey']		= 	$this->security->xss_clean($this->input->post('orderKey'));
	$faq['metaName']	= 	$this->security->xss_clean($this->input->post('metaName'));
	$faq['isActive']				= 	$this->security->xss_clean($this->input->post('isActive'));
	$faq['metaDescription']= 	$this->security->xss_clean($this->input->post('metaDescription'));
	$faq['pageTitle']= 	$this->security->xss_clean($this->input->post('pageTitle'));
	$faq['lastUpdateDate']			= 	time();
	$edit_id							= 	$this->security->xss_clean($this->input->post('edit_id'));
	$this->db->where('faqId',$edit_id);
	return ($this->db->update('mob_faq_page_info',$faq)) ? TRUE:FALSE;
		}
	

}
?>