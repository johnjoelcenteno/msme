<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interview extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function secondForm()
    {
        $salaryGrade = $this->input->get('salary_grade');
        $applicant_id = $this->input->get('applicant_id');
        $plantilla_no = $this->input->get('plantilla_no');

        $applicantTable = $this->Main_model->get_where("applicant", "applicant_id", $applicant_id)->row();
        $positionsTable = $this->Main_model->get_where("position", "plantilla_item_no", $plantilla_no)->row();
        $data['applicant_id'] = $applicant_id;
        $data['plantilla_no'] = $plantilla_no;
        $data['applicantTable'] = $applicantTable;
        $data['positionTable'] = $positionsTable;
        $data['applicant_name'] = "$applicantTable->firstname $applicantTable->middlename $applicantTable->lastname";

        $params['viewName'] = 'manage_interviews/sgFifteen';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function sendPost()
    {
        $insert['applicant_id'] = $this->input->post('applicant_id');
        $insert['applicant_info'] = json_encode($this->Main_model->get_where("applicant", "applicant_id", $this->input->post('applicant_id'))->result_array());
        $insert['plantilla_item_no'] = $this->input->post('plantilla_item_no');
        $insert['total_score_a'] = $this->input->post('total_score_a');
        $insert['total_score_b'] = $this->input->post('total_score_b');
        $insert['total'] = $this->input->post('total');
        $insert['answers'] = $this->input->post('answers');
        $insert['date_interviewed'] = date("Y-m-d");
        $insert['dd_title'] = $this->input->post("dd_title");
        $this->Main_model->_insert("interview", $insert);
    }

    public function updatePlantillaNumberOfApplicant()
    {
        $applicant_id = $this->input->post('applicant_id');

        $update['position_applied_for'] = $this->input->post('position_applied_for'); // will receive what is left after client side processes
        $this->Main_model->_update('applicant', 'applicant_id', $applicant_id, $update);
    }

    public function firstForm()
    {
        $salaryGrade = $this->input->get('salary_grade');
        $applicant_id = $this->input->get('applicant_id');
        $plantilla_no = $this->input->get('plantilla_no');

        $applicantTable = $this->Main_model->get_where("applicant", "applicant_id", $applicant_id)->row();
        $positionsTable = $this->Main_model->get_where("position", "plantilla_item_no", $plantilla_no)->row();
        $data['applicant_id'] = $applicant_id;
        $data['plantilla_no'] = $plantilla_no;
        $data['applicantTable'] = $applicantTable;
        $data['positionTable'] = $positionsTable;
        $data['applicant_name'] = "$applicantTable->firstname $applicantTable->middlename $applicantTable->lastname";


        $params['viewName'] = 'manage_interviews/sgOne';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }
}
