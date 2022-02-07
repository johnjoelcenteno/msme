<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'manage_position/index';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function configureVacantPositions()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'manage_position/configureVacantPositions';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function updateVacantPosition()
    {
        echo $positionId = $this->input->post("position_id");
        echo $isChecked = $this->input->post("is_checked") == "true" ? 1 : 0;

        $update['is_vacant'] = $isChecked;
        $this->Main_model->_update("position", "position_id", $positionId, $update);
    }

    public function update()
    {
        $positionId = $this->input->get("id");
        $positionTable = $this->Main_model->get_where("position", "position_id", $positionId)->row();
        $divisionTable = $this->Main_model->get("division", "division_id")->result();

        $data['positionTable'] = $positionTable;
        $data['penro'] = $this->Main_model->getPenroByOfficeId($positionTable->office_id);
        $data['divisionTable'] = $divisionTable;


        $params['viewName'] = 'manage_position/update';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function get()
    {
        $this->db->select("*");
        $this->db->from("position");
        $this->db->join("offices", "position.office_id = offices.office_id");
        $result = $this->db->get()->result_array();

        echo json_encode($result);
    }

    public function create()
    {
        $divisionTable = $this->Main_model->get("division", "division_id")->result();

        $data['divisionTable'] = $divisionTable;

        $params['viewName'] = 'manage_position/create';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function createPost()
    {
        $create['position_title'] = $this->input->post("position_title");
        $create['plantilla_item_no'] = $this->input->post("plantilla_item_no");
        $create['office_id'] = $this->input->post("office_id");
        $create['Salary_job_pay_scale'] = $this->input->post("salary_job_pay_scale");
        $create['education'] = $this->input->post("education");
        $create['training'] = $this->input->post("training");
        $create['expirience'] = $this->input->post("expirience");
        $create['eligibility'] = $this->input->post("eligibility");
        $create['competency'] = $this->input->post("eligibility");
        $create['division_id'] = $this->input->post("division_id");

        echo $this->Main_model->_insert("position", $create);
    }

    public function updatePost()
    {
        $positionId = $this->input->post("positionId");

        $update['position_title'] = $this->input->post("position_title");
        $update['plantilla_item_no'] = $this->input->post("plantilla_item_no");
        $update['office_id'] = $this->input->post("office_id");
        $update['Salary_job_pay_scale'] = $this->input->post("salary_job_pay_scale");
        $update['education'] = $this->input->post("education");
        $update['training'] = $this->input->post("training");
        $update['expirience'] = $this->input->post("expirience");
        $update['eligibility'] = $this->input->post("eligibility");
        $update['competency'] = $this->input->post("eligibility");
        $update['division_id'] = $this->input->post("division_id");

        echo $this->Main_model->_update("position", "position_id", $positionId, $update);
    }

    public function destroy()
    {
        $request = json_decode(file_get_contents('php://input'));

        $this->Main_model->_delete("position", "position_id", $request->position_id);
    }
}
