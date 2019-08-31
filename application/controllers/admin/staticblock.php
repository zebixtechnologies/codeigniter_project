<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
session_start();
class staticblock extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/staticblock/staticblock_model');
	}
	
public function aboutus()
{

		if($this->session->userdata('logged_in'))
		{
			
			$user_data = $this->session->userdata('logged_in');
			$data['user'] = $user_data;
			$static_block_id = 3; 
			$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
			$data['active'] = 7;
			$this->load->view('admin/home_header',$data);
			$this->load->view('admin/staticblock/static_block_view');
			$this->load->view('admin/home_footer');
		}
		else
		{
     //If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
	
}

public	function updateBlock()
	{
		if($this->session->userdata('logged_in'))
		{
			
			
			$result = $this->staticblock_model->updateStaticBlock();
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		
		}
	}

	public function verticalworks()
	{
	
			if($this->session->userdata('logged_in'))
			{
				
				$user_data = $this->session->userdata('logged_in');
				$data['user'] = $user_data;
				$static_block_id = 4; //pass static block page id
				$data['active'] = 6;
				$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/staticblock/static_block_view');
				$this->load->view('admin/home_footer');
			}
			else
			{
	     //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}
		
	}
	public function report()
	{
	
			if($this->session->userdata('logged_in'))
			{
				
				$user_data = $this->session->userdata('logged_in');
				$data['user'] = $user_data;
				$static_block_id = 1; //pass static block page id
				$data['active'] = 5;
				$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/staticblock/static_block_view');
				$this->load->view('admin/home_footer');
			}
			else
			{
	     //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}
		
	}

	public function datareport()
	{
	
			if($this->session->userdata('logged_in'))
			{
				
				$user_data = $this->session->userdata('logged_in');
				$data['user'] = $user_data;
				$static_block_id = 2; //pass static block page id
				$data['active'] = 2;
				$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/staticblock/static_block_view');
				$this->load->view('admin/home_footer');
			}
			else
			{
	     //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}
		
	}
	
	public function highlyfocuse()
	{
	
			if($this->session->userdata('logged_in'))
			{
				
				$user_data = $this->session->userdata('logged_in');
				$data['user'] = $user_data;
				$static_block_id = 5; //pass static block page id
				$data['active'] = 4;
				$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/staticblock/static_block_view');
				$this->load->view('admin/home_footer');
			}
			else
			{
	     //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}
		
	}
// update by raj

public function publishers()
	{
	
			if($this->session->userdata('logged_in'))
			{
				
				$user_data = $this->session->userdata('logged_in');
				$data['user'] = $user_data;
				$static_block_id  = 10; //pass static block page id
				$data['active'] = 1;
				$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/staticblock/static_block_view');
				$this->load->view('admin/home_footer');
			}
			else
			{
	     //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}
		
	}

public function advertisers()
	{
	
			if($this->session->userdata('logged_in'))
			{
				
				$user_data = $this->session->userdata('logged_in');
				$data['user'] = $user_data;
				$static_block_id = 11; //pass static block page id
				$data['active'] = 9;
				$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
				$this->load->view('admin/home_header',$data);
				$this->load->view('admin/staticblock/static_block_view');
				$this->load->view('admin/home_footer');
			}
			else
			{
	     //If no session, redirect to login page
				redirect('admin/login', 'refresh');
			}
		
	}
	
		public function faq()
			{
			
					if($this->session->userdata('logged_in'))
					{
						
						$user_data = $this->session->userdata('logged_in');
						$data['user'] = $user_data;
						$static_block_id = 6; //pass static block page id
						$data['active'] = 10;
						$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
						$this->load->view('admin/home_header',$data);
						$this->load->view('admin/staticblock/static_block_view');
						$this->load->view('admin/home_footer');
					}
					else
					{
				 //If no session, redirect to login page
						redirect('admin/login', 'refresh');
					}
				
			}
			
		public function terms()
			{
			
					if($this->session->userdata('logged_in'))
					{
						
						$user_data = $this->session->userdata('logged_in');
						$data['user'] = $user_data;
						$static_block_id = 7; //pass static block page id
						$data['active'] = 12;
						$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
						$this->load->view('admin/home_header',$data);
						$this->load->view('admin/staticblock/static_block_view');
						$this->load->view('admin/home_footer');
					}
					else
					{
				 //If no session, redirect to login page
						redirect('admin/login', 'refresh');
					}
				
			}

		public function privacy()
			{
			
					if($this->session->userdata('logged_in'))
					{
						
						$user_data = $this->session->userdata('logged_in');
						$data['user'] = $user_data;
						$static_block_id = 8; //pass static block page id
						$data['active'] = 13;
						$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
						$this->load->view('admin/home_header',$data);
						$this->load->view('admin/staticblock/static_block_view');
						$this->load->view('admin/home_footer');
					}
					else
					{
				 //If no session, redirect to login page
						redirect('admin/login', 'refresh');
					}
				
			}
                        // created by sarvesh
                  public function careers() {
                          if($this->session->userdata('logged_in'))
					{
						
						$user_data = $this->session->userdata('logged_in');
						$data['user'] = $user_data;
						$static_block_id = 12; //pass static block page id
						$data['active'] = 14;
						$data['blockInfo'] = $this->staticblock_model->getStaticBlock($static_block_id);
						$this->load->view('admin/home_header',$data);
						$this->load->view('admin/staticblock/static_block_view');
						$this->load->view('admin/home_footer');
					}
					else
					{
				 //If no session, redirect to login page
						redirect('admin/login', 'refresh');
					}  
                        }             
                  //End sarvesh task

}
?>