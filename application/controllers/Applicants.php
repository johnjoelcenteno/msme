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
		echo json_encode($this->Main_model->get("applicant", "applicant_id")->result_array());
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
		$data['position_title'] = $this->input->post("position_title");
		$data['plantilla_item_no'] = $this->input->post("plantilla_item_no");
		$data['office_name'] = $this->input->post("office_name");
		$data['province'] = $this->input->post("province");

		$this->Main_model->_insert("applicant", $data);
	}

	public function update()
	{
		$applicant_id = $this->uri->segment(3);

		$data['applicant_id'] = $applicant_id;
		$data['guid'] = $this->Main_model->createGuid();
		$data['listOfOffices'] = $this->Main_model->get('offices', 'office_id');
		$data['formInput'] = json_encode($this->Main_model->get_where("applicant", "applicant_id", $applicant_id)->result_array());

		$params['viewName'] = 'manage_applicants/update';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function updatePost()
	{
		$credentialsId = $this->input->post('credentials_id');
		$employeeId = $this->input->post('employee_id');
		$userType = $this->input->post('user_role') == 'secretariat' ? "super_admin" : 'regular';

		$email = $this->input->post("email_address");
		$password = $this->Main_model->passwordEncryptor("1234");
		$cred['username'] = $email;
		$cred['password'] = $password;
		$cred['user_type'] = $userType;
		$this->Main_model->_update("credentials", 'credentials_id', $credentialsId, $cred);

		$create['designation'] = $this->input->post("designation");
		$create['email_address'] = $this->input->post("email_address");
		$create['firstname'] = $this->input->post("firstname");
		$create['lastname'] = $this->input->post("lastname");
		$create['middlename'] = $this->input->post("middlename");
		$create['office_name'] = $this->input->post("office_name");
		$create['position'] = $this->input->post("position");
		$create['province'] = $this->input->post("province");
		$create['user_role'] = $this->input->post("user_role");
		$create['vacant_position_to_rate'] = $this->input->post("vacant_position_to_rate");

		$this->Main_model->_update('employee', 'employee_id', $employeeId, $create);
	}
}
