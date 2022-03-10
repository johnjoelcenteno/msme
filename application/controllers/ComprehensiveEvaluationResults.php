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
        $data = array();
        $params['viewName'] = 'manage_interviews/manageComprehensiveEvaluation';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function comprehensiveEvaluationResults()
    {
        $data = array();
        $params['viewName'] = 'manage_interviews/comprehensiveEvaluationResults';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function viewComprehensiveEvaluationResultsOfPosition()
    {
        $positionId = $this->uri->segment(3);

        $data['positionId'] = $positionId;
        $data['positionTable'] = $this->Main_model->get_where("position", "position_id", $positionId);
        $params['viewName'] = 'manage_interviews/viewComprehensiveEvaluationResults';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function determineIfProvincialSecretariat()
    {
        $employeeTable = $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->row();
        if ($employeeTable->user_role == 'secretariat' && $employeeTable->office_name == 'Management Services Division') {
            echo "1";
            return 1;
        } else {
            echo '0';
            return 0;
        }
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
        $plantillaNo = $this->input->get('plantilla_no');
        $employeeId = $this->Credentials_model->getUserId();

        $interviewWhere['applicant_id'] = $applicant_id;
        $interviewWhere['plantilla_item_no'] = $plantillaNo;
        if ($this->determineIfProvincialSecretariat() == 1) $interviewWhere['provincial_secretariat_id'] = $employeeId;
        $data['interviewTable'] = json_encode($this->Main_model->multiple_where("interview", $interviewWhere) ? $this->Main_model->multiple_where("interview", $interviewWhere)->result_array() : "");
        $data['positionsForInterview'] = json_encode($this->Main_model->get_where("position", "is_for_interview", 1) ? $this->Main_model->get_where("position", "is_for_interview", 1)->result_array() : "");
        // $this->Main_model->showNormalArray($interviewWhere);
        // $this->Main_model->showNormalArray($data);
        // die;
        $data['employeeTable'] = json_encode($this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id']) ? $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->result_array() : "");
        $data['applicantsTable'] = json_encode($this->Main_model->get("applicant", "applicant_id") ? $this->Main_model->get("interview", "interview_id")->result_array() : "");

        $data['applicant_info'] = $this->Main_model->get_where('applicant', 'applicant_id', $applicant_id)->row();
        $data['isProvincialSecretariat'] = $this->determineIfProvincialSecretariat();

        $interviewWhere['plantilla_item_no'] = $plantillaNo;
        $interviewWhere['applicant_id'] = $applicant_id;
        $data['interviewTable'] = json_encode($this->Main_model->multiple_where("interview", $interviewWhere)->row());

        // $this->Main_model->showNormalArray($data['interviewTable']);
        $params['viewName'] = 'comprehensive_evaluation_results/addScores';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function insertAddedScores()
    {
        $interview_id = $this->input->post('interview_id');
        $employeeId = $this->Credentials_model->getUserId();

        $update['education'] = $this->input->post('education');
        $update['performance'] = $this->input->post('performance');
        $update['training'] = $this->input->post('training');
        $update['experience'] = $this->input->post('experience');
        $update['written_skill'] = $this->input->post('written_skill');
        $update['total_added'] = $this->input->post('total');
        $update['awards'] = $this->input->post('awards');
        $update['comprehensive_remarks'] = $this->input->post('comprehensive_remarks') == "" ? "Approved" : $this->input->post('comprehensive_remarks');
        $update['is_completed'] = 1;

        if ($this->determineIfProvincialSecretariat() == 1) {
            $update['provincial_secretariat_completed'] = 1;
            $update['provincial_secretariat_id'] = $employeeId;
        }
        $this->Main_model->_update("interview", "interview_id", $interview_id, $update);
        $this->Main_model->showNormalArray($update);
    }
}
