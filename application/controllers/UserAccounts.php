<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserAccounts extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data['guid'] = $this->Main_model->createGuid();

		$params['viewName'] = 'manageEmployees';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function getAllUsers()
	{
		echo json_encode($this->Main_model->get("employee", "employee_id")->result_array());
	}

	public function destroy()
	{
		$request = json_decode(file_get_contents('php://input'));

		$this->Main_model->_delete("employee", "employee_id", $request->employee_id);
		$this->Main_model->_delete("credentials", "credentials_id", $request->credentials_id);
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

	public function create()
	{
		$data['guid'] = $this->Main_model->createGuid();
		$data['listOfOffices'] = $this->Main_model->get('offices', 'office_id');

		$params['viewName'] = 'manage_accounts/create';
		$params['pageTitle'] = '';
		$params['renderedData'] = $data;

		$this->load->library('view_manipulation', $params);
		$this->view_manipulation->renderViewWithLayout();
	}

	public function createPost()
	{
		$userType = $this->input->post('user_role') == 'secretariat' ? "super_admin" : 'regular';

		$email = $this->input->post("email_address");
		$password = $this->Main_model->passwordEncryptor("1234");
		$cred['username'] = $email;
		$cred['password'] = $password;
		$cred['user_type'] = $userType;
		$credId = $this->Main_model->_insert("credentials", $cred);

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
		$create['credentials_id'] = $credId;

		$this->Main_model->_insert('employee', $create);
	}

	public function update()
	{
		$employeeId = $this->uri->segment(3);

		$data['employeeId'] = $employeeId;
		$data['guid'] = $this->Main_model->createGuid();
		$data['listOfOffices'] = $this->Main_model->get('offices', 'office_id');
		$data['formInput'] = json_encode($this->Main_model->get_where("employee", "employee_id", $employeeId)->result_array());

		$params['viewName'] = 'manage_accounts/update';
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
