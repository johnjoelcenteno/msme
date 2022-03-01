<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicants extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data['guid'] = $this->Main_model->createGuid();

		$params['viewName'] = 'manage_applicants/index';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function getAllUsers()
	{
		echo json_encode($this->Main_model->get("applicant", "applicant_id") ? $this->Main_model->get("applicant", "applicant_id")->result_array() : "");
	}

	public function destroy()
	{
		$request = json_decode(file_get_contents('php://input'));

		$this->Main_model->_delete("applicant", "applicant_id", $request->applicant_id);
	}

	public function getAllOffices()
	{
		echo json_encode($this->Main_model->get("offices", "office_id")->result_array());
	}

	public function getListOfPenros()
	{
		$selectedOffice = $this->input->post("selected_office");

		$query = $this->Main_model->get_where("offices", "province", $selectedOffice);

		echo '<option value="">Select PENRO/CENRO/Regional Office</option>';
		foreach ($query->result() as $row) {
			echo '
                <option value="' . $row->office_name . '">' . $row->office_name  . '</option>
            ';
		}
	}

	public function getListOfPosition()
	{
		$officeId = $this->input->post("office_id");
		echo json_encode($this->Main_model->get_where("position", "office_id", $officeId)->result_array());
	}

	public function vacantPositions()
	{
		$vacantPositions = $this->Main_model->get_where("position", "is_vacant", "1");

		foreach ($vacantPositions->result() as $row) {
			$text = "$row->position_title : $row->plantilla_item_no : $row->office_name - $row->province";
			echo "
				<tr>
					<td><input type='checkbox' class='form-control' value='$text'></td>
					<td><h3 style='display: inline; ml-3'>$text</h3></td>
				</tr>
			";
		}
	}

	public function create()
	{
		$data['guid'] = $this->Main_model->createGuid();
		$data['listOfOffices'] = $this->Main_model->get('offices', 'office_id');

		$params['viewName'] = 'manage_applicants/create';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function createPost()
	{
		$data['firstname'] = $this->input->post("firstname");
		$data['middlename'] = $this->input->post("middlename");
		$data['lastname'] = $this->input->post("lastname");
		$data['gender'] = $this->input->post("gender");
		$data['age'] = $this->input->post("age");
		$data['eligibility'] = $this->input->post("eligibility");
		$data['position_designation'] = $this->input->post("position_designation");
		$data['salary_grade'] = $this->input->post("salary_grade");
		$data['place_of_assignment'] = $this->input->post("place_of_assignment");
		$data['status_of_appointment'] = $this->input->post("status_of_appointment");
		$data['education_attainment'] = $this->input->post("education_attainment");
		$data['date_of_last_promotion'] = $this->input->post("date_of_last_promotion");
		$data['latest_IPCR_rating'] = $this->input->post("latest_IPCR_rating");
		$data['relevant_training_hours'] = $this->input->post("relevant_training_hours");
		$data['relevant_experience'] = $this->input->post("relevant_experience");
		$data['position_applied_for'] = $this->input->post("position_applied_for");

		$this->Main_model->_insert("applicant", $data);
	}

	public function update()
	{
		$applicant_id = $this->uri->segment(3);

		$data['applicant_id'] = $applicant_id;
		$data['guid'] = $this->Main_model->createGuid();
		$data['listOfOffices'] = $this->Main_model->get('offices', 'office_id');
		$query = $this->Main_model->get_where("applicant", "applicant_id", $applicant_id)->result_array();
		$data['formInput'] = json_encode($query);

		$params['viewName'] = 'manage_applicants/update';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function updatePost()
	{
		$id = $this->input->post('id');
		$data['firstname'] = $this->input->post("firstname");
		$data['middlename'] = $this->input->post("middlename");
		$data['lastname'] = $this->input->post("lastname");
		$data['gender'] = $this->input->post("gender");
		$data['age'] = $this->input->post("age");
		$data['eligibility'] = $this->input->post("eligibility");
		$data['position_designation'] = $this->input->post("position_designation");
		$data['salary_grade'] = $this->input->post("salary_grade");
		$data['place_of_assignment'] = $this->input->post("place_of_assignment");
		$data['status_of_appointment'] = $this->input->post("status_of_appointment");
		$data['education_attainment'] = $this->input->post("education_attainment");
		$data['date_of_last_promotion'] = $this->input->post("date_of_last_promotion");
		$data['latest_IPCR_rating'] = $this->input->post("latest_IPCR_rating");
		$data['relevant_training_hours'] = $this->input->post("relevant_training_hours");
		$data['relevant_experience'] = $this->input->post("relevant_experience");
		$data['position_applied_for'] = $this->input->post("position_applied_for");

		$this->Main_model->_update("applicant", "applicant_id", $id, $data);
	}
}
