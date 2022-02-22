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

    public function update()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'manage_accounts/update';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function delete()
    {
    }
}
