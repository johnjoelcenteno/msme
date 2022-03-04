<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InterviewRatingManagement extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function determineIfSecretariat()
    {
        $employeeId = $this->Credentials_model->getUserId();
        $isSecretariat = $this->Main_model->get_where("employee", 'employee_id', $employeeId)->row()->user_role == 'secretariat' ? true : false;
        if ($isSecretariat) {
            redirect("InterviewRatingManagement/secretariatReview");
        }
    }

    public function index()
    {
        $this->determineIfSecretariat();
        $this->Main_model->alertPromt('You already rated this applicant', 'canNotReview');
        $data['positionsForInterview'] = json_encode($this->Main_model->get_where("position", "is_for_interview", 1) ? $this->Main_model->get_where("position", "is_for_interview", 1)->result_array() : "");

        $data['employeeTable'] = json_encode($this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id']) ? $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->result_array() : "");
        $data['applicantsTable'] = json_encode($this->Main_model->get("applicant", "applicant_id") ? $this->Main_model->get("applicant", "applicant_id")->result_array() : "");
        // $this->Main_model->showNormalArray($this->Main_model->get("applicant", "applicant_id")->result());

        $params['viewName'] = 'interview_rating_management/index';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function secretariatReview()
    {
        $data = array();
        $params['viewName'] = 'interview_rating_management/secretariatReview';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function getAllInterviewsForSecretariat()
    {
        $employeeId = $this->Credentials_model->getUserId();
        $logedInProvince = $this->Main_model->get_where("employee", "employee_id", $employeeId)->row()->province;

        $returnData = array();
        $ratedApplicants = $this->Main_model->get_where("rated_applicants", "employee_province", $logedInProvince);
        foreach ($ratedApplicants->result_array() as $row) {
            $row['title_location'] = $row['position_title'] . " : " . $row['plantilla_item_no'] . " : " . $row['employee_province'] . " - " . $row['employee_office_name'];
            array_push($returnData, $row);
        }

        echo json_encode($returnData);
    }

    public function getAllInterviews()
    {
        $query = $this->Main_model->get("interview", "interview_id");
        return json_encode($query ? $query->result_array() : "");
    }

    public function oldInterviewRating()
    {
        $data = array();
        $params['viewName'] = 'interview_rating_management/index';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }
}
