<?php
ob_start();
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

session_start();
//we need to call PHP's session object to access it through CI
class advertiser extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user/advertiser_model');
		
	}

	public function index() {

		$this->load->view('include/header');
	//	$data['dashboard'] = $this->advertiser_model->getAdvDashboardInfo();
		$this->load->view('include/footer');

	}
	public function reports() {

		$this->load->view('include/user_header');
		$data['report'] = $this->advertiser_model->getReport();
		$this->load->view('include/user_footer');

	}
	public function getFilteredReport() {

		$this->load->view('include/user_header');
		$data['report'] = $this->advertiser_model->getFilteredReport();
		$this->load->view('include/user_footer');

	}
		public function add() {

		$this->load->view('include/user_header');
		$result = $this->advertiser_model->addAd();
		$this->load->view('include/user_footer');

	}
	public function edit() {

		$this->load->view('include/user_header');
		$result = $this->advertiser_model->modifyAd();
		$this->load->view('include/user_footer');

	}
		public function display() {

		$this->load->view('include/user_header');
		$data['ad'] = $this->advertiser_model->listAds();
		$this->load->view('include/user_footer');

	}
		public function accountmodify() {

		$this->load->view('include/user_header');
		$result = $this->advertiser_model->modifyAccountInfo();
		$this->load->view('include/user_footer');

	}
		public function modifypassword() {

		$this->load->view('include/user_header');
		$result = $this->advertiser_model->changePassword();
		$this->load->view('include/user_footer');

	}
		
		
		
		
}