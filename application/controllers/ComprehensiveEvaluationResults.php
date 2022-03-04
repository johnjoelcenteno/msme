<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ComprehensiveEvaluationResults extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index()
    {
        $data['positionsForInterview'] = json_encode($this->Main_model->get_where("position", "is_for_interview", 1) ? $this->Main_model->get_where("position", "is_for_interview", 1)->result_array() : "");

        $data['employeeTable'] = json_encode($this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id']) ? $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->result_array() : "");
        $data['applicantsTable'] = json_encode($this->Main_model->get_where("interview", "is_completed !=", 1) ? $this->Main_model->get_where("interview", "is_completed !=", 1)->result_array() : "");

        $params['viewName'] = 'comprehensive_evaluation_results/index';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function getAllInterviews()
    {
        $query = $this->Main_model->get("interview", "plantilla_item_no");
        $processedCandidates = [];
        foreach ($query->result() as $row) {
            $applicant_info = json_decode($row->applicant_info, false)[0];
            $data['dd_title'] = $row->dd_title;
            $data['interview_id'] = $row->interview_id;
            $data['plantilla_no'] = $row->plantilla_item_no;
            $data['name_of_candidate'] = "$applicant_info->firstname $applicant_info->middlename $applicant_info->lastname";
            array_push($processedCandidates, $data);
        }
        // $this->Main_model->showNormalArray($processedCandidates);
        echo json_encode($processedCandidates ? $processedCandidates : "");
    }

    public function addOtherScores()
    {
        $applicant_id = $this->input->get('applicant_id');
        $data['positionsForInterview'] = json_encode($this->Main_model->get_where("position", "is_for_interview", 1) ? $this->Main_model->get_where("position", "is_for_interview", 1)->result_array() : "");

        $data['employeeTable'] = json_encode($this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id']) ? $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->result_array() : "");
        $data['applicantsTable'] = json_encode($this->Main_model->get("applicant", "applicant_id") ? $this->Main_model->get("interview", "interview_id")->result_array() : "");

        $data['applicant_info'] = $this->Main_model->get_where('applicant', 'applicant_id', $applicant_id)->row();

        $params['viewName'] = 'comprehensive_evaluation_results/addScores';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function insertAddedScores()
    {
        $interview_id = $this->input->post('interview_id');
        $update['education'] = $this->input->post('education');
        $update['performance'] = $this->input->post('performance');
        $update['training'] = $this->input->post('training');
        $update['experience'] = $this->input->post('experience');
        $update['written_skill'] = $this->input->post('written_skill');
        $update['total_added'] = $this->input->post('total');
        $update['awards'] = $this->input->post('awards');
        $update['comprehensive_remarks'] = $this->input->post('comprehensive_remarks');
        $update['is_completed'] = 1;
        $this->Main_model->_update("interview", "interview_id", $interview_id, $update);
    }
}
