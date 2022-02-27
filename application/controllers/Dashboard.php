<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data['positionsForInterview'] = json_encode($this->Main_model->get_where("position", "is_for_interview", 1)->result_array());
		$data['employeeTable'] = json_encode($this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->result_array());
		$data['applicantsTable'] = json_encode($this->Main_model->get("applicant", "applicant_id")->result_array());
		$data['guid'] = $this->Main_model->createGuid();

		$params['viewName'] = 'dashboard';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}
}
