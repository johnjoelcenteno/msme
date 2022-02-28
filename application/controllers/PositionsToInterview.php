<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PositionsToInterview extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data['guid'] = $this->Main_model->createGuid();

		$params['viewName'] = 'manage_interviews/index';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function getAllPositions()
	{
		$positionsTable = $this->Main_model->get_where("position", "is_vacant", "1");
		// $this->Main_model->array_show($positionsTable);
		//position_title, plantilla_item_no, division_cenro

		$processedArray = [];
		foreach ($positionsTable->result() as $row) {
			$data['position_id'] = $row->position_id;
			$data['position_title'] = $row->position_title;
			$data['plantilla_item_no'] = $row->plantilla_item_no;
			$data['division_cenro'] = $row->office_name . " - " . $row->province;
			$data['is_for_interview'] = $row->is_for_interview;
			array_push($processedArray, $data);
		}

		echo json_encode($processedArray);
	}

	public function updateIsForInterview()
	{
		$position_id = $this->input->post('position_id');
		$is_checked = $this->input->post('is_checked') == "true" ? 1 : 0;

		$update['is_for_interview'] = $is_checked;
		$this->Main_model->_update("position", "position_id", $position_id, $update);
	}
}
