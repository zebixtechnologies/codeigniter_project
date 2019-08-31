<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: vaibhav
 * Description: Login controller class
 */
class login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('admin/login_model');					
		$this->load->model('admin/profile_model');					
	}
	
	public function index($msg = NULL){
		// Load our view to be displayed
		// to the user
		$data['msg'] = $msg;
		$this->load->view('admin/login_view', $data);
	}
	
	public function process(){
		// Load the model
		
		// Validate the user can login
		$result = $this->login_model->validate();
		// Now we verify the result
		if(! $result){
			// If user did not validate, then show them login page again
			$msg = '<b calss="text-error">Invalid username and/or password.</b>';
			$this->index($msg);
		}else{
			// If user did validate, 
			// Send them to members area
				redirect('admin/dashboard');
		}		
	}
	
	function generatePass($length=10) 
				{
					$characters = '012fGsdafGERHJHGHDF1G2DS1FG1DfghS1FG32fdsgdfsgdf1DF3G1DS32F1G32D1FG31DFSF3G21DF321G3D2F1GDF1G3DTU1TYU1TRY1UIT1TYJ3GDFS4567A8GFDGGSDFGDFSGDSFGDFG997t89re7t877q98r7qer87tr87uy8t7i7u8i7u87of87d8g7f7hg78j7h78k987l4g5f456h4gf54j5h45kj44f54gf54hf55j4544g54fh45j44jk54cxzvvbxb4vnvbcn4v4bn45vbDSA4GSGF5456H4G5H456454HFG54HF874gdf564g56df56g4df564g56df4GSDGHFGGSDG908yGFDSG984oeijhg85GDSFGDSF4oitg98gj1FGSFDSGDSFGDG00147gDSFG85236GDFSGSDFTdfgdsEUdfghdsjkgdsffsweqwdfdsfggghgghjGgHJgjhGfghHJgGJgJhhfgHJggggggJgJHggJGjGhjdfhjkfdgjkldj974T5R4ET98ERTE8G4ERG5RE4G4ERE5RG48E4G1F864G4GH5DFS4H4KJ5H4GK444ffsadff45sd64f564sfds4g98hbdf56f4f4dsg4df5s64g564O4F539517539DF12354DFGDS8935845255';
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, strlen($characters) - 1)];
					}
					return $randomString;
				}
	public function forgetpassword()
		 {
		   $result = $this->login_model->forgetpasswordValid();
		   if(!$result)
		   	{
				// If user did not validate, then show them login page again
				echo 2;
			}
		else
			{
				$forgetData['user_password'] = $result->user_pass;
				$forgetData['User_name_data'] = $result->user_name;
				$forgetData['{base_url}'] = $this->config->base_url();
				$forgetData['Site_name'] = SITE_NAME;
				$forgetData['site_number'] = SITE_CUSTOMER_CARE;
				
				require_once("mailer/Email.php");
				$emailSender = new Email();
				$emailSender->SendEmail('forget_password',$forgetData,$result->user_email,ADMIN_MAIL,ADMIN_MAIL_PASSWORD,SITE_NAME,'Get Your Password');
				
			} 
	}
	 
	public function logout()
		 {
		   $this->session->unset_userdata('logged_in');
		   redirect('admin/login', 'refresh');
		 }
}
?>