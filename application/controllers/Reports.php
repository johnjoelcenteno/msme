<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
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
        $data['applicantsTable'] = json_encode($this->Main_model->get("applicant", "applicant_id") ? $this->Main_model->get("applicant", "applicant_id")->result_array() : "");
        // $this->Main_model->showNormalArray($this->Main_model->get("applicant", "applicant_id")->result());

        $params['viewName'] = 'manage_reports/managePositionsSummaryInterviewRatingSheet';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function determineIfProvincialSecretariat()
    {
        $employeeTable = $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->row();
        if ($employeeTable->user_role == 'secretariat' && $employeeTable->office_name == 'Management Services Division') {
            return 1;
        } else {
            return 0;
        }
    }

    public function getAllPositionsThatIsVacantAndForInterview()
    {
        $isProvincialSecretariat = $this->determineIfProvincialSecretariat();
        $employeeId = $this->Credentials_model->getUserId();

        if ($isProvincialSecretariat == 1) {
            $provinceOfLogedInUser = $this->Main_model->get_where("employee", "employee_id", $employeeId)->row()->province;

            $where['is_vacant'] = 1;
            $where['is_for_interview'] = 1;
            $where['province'] = $provinceOfLogedInUser;
        } else {
            $where['is_vacant'] = 1;
            $where['is_for_interview'] = 1;
        }

        $returnArray = [];
        $query = $this->Main_model->multiple_where("position", $where);
        // $this->Main_model->showNormalArray($query->result_array());

        foreach ($query->result_array() as $row) {
            $row['place_of_vacancy'] = $row['position_title'] . " : " . $row['plantilla_item_no'] . " : " . $row['office_name'] . " - " . $row['province'];
            array_push($returnArray, $row);
        }

        echo json_encode($query ? $returnArray : "");
    }


    public function viewInterviewRatingResults()
    {
        $positionId = $this->uri->segment(3);

        $data['positionId'] = $positionId;
        $data['positionTable'] = $this->Main_model->get_where("position", "position_id", $positionId);
        $params['viewName'] = 'manage_reports/interviewRatingResults';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function getAllInterviewsForSummaryInterviewRatingSheet()
    {
        $positionId = $this->uri->segment(3);

        $isProvincial = $this->determineIfProvincialSecretariat();

        if ($isProvincial == 1) {
            $employeeId = $this->Credentials_model->getUserId();
            $where['province_of_rater'] =  $this->Main_model->get_where("employee", "employee_id", $employeeId)->row()->province;
        }

        $positionTable = $this->Main_model->get_where("position", "position_id", $positionId)->row();
        $plantillaItemNoOfTheGivenPosition = $positionTable->plantilla_item_no;
        $salaryGrade = $positionTable->Salary_job_pay_scale;

        $where['plantilla_item_no'] = $plantillaItemNoOfTheGivenPosition;
        $interviewTable = $this->Main_model->multiple_where("interview", $where);

        $processedArray = [];
        foreach ($interviewTable->result_array() as $row) {
            $row["salary_grade"] = $salaryGrade;
            array_push($processedArray, $row);
        }

        if ($interviewTable == false) return;
        echo json_encode($processedArray);
    }









    // Useless code i think? 

    public function getAllInterviews()
    {
        $query = $this->Main_model->get("interview", "interview_id") ? $this->Main_model->get("interview", "interview_id")->result_array() : "";
        echo json_encode($query);
    }

    public function applicant_total_scores()
    {
        $interviewId = $this->uri->segment(3);

        $data['interview_info'] = $this->Main_model->get_where('interview', 'interview_id', $interviewId);
        // $this->Main_model->showNormalArray($data['interview_info']->result());

        $params['viewName'] = 'manage_reports/summary_interview_table';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }
}
