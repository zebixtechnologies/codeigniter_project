<?php
ob_start();
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
session_start();
//we need to call PHP's session object to access it through CI
class publisher extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/category/category_model');
		$this->load->model('static_model');
	}

	public function index() {

		$this->load->view('include/header');
		$data['category'] = $this->category_model->getparentcategaryInfo(1);
		$this->load->view('include/footer');

	}
}