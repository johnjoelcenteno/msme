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

    public function determineIfFirstlevelOrSecondLevel()
    {
        $employeeId = $this->Credentials_model->getUserId();
        $employeeUserRole = $this->Main_model->get_where('employee', "employee_id", $employeeId)->row()->user_role;

        $userRoles['k4Representative1stLevel'] = 1;
        $userRoles['gadRepresentative1stLevel'] = 1;
        $userRoles['k4Representative2ndLevel'] = 2;
        $userRoles['gadRepresentative2ndLevel'] = 2;


        $checkListArray = ["k4Representative1stLevel", "gadRepresentative1stLevel", "k4Representative2ndLevel", "gadRepresentative2ndLevel"];

        return in_array($employeeUserRole, $checkListArray) ? $userRoles[$employeeUserRole] : 0;
    }

    public function determinePositionsByLogedInUser()
    {
        $firstOrSecondLevel = $this->determineIfFirstlevelOrSecondLevel();

        switch ($firstOrSecondLevel) {
            case 1:
                $where['Salary_job_pay_scale <='] = 9; // first level
                break;

            case 2:
                $where['Salary_job_pay_scale >'] = 9; // second level
                break;
        }

        $where['is_for_interview'] = 1;
        $query = $this->Main_model->multiple_where("position", $where);
        // $this->Main_model->showNormalArray($query->result());
        // die;
        return $query;
    }

    public function index()
    {
        $this->determineIfSecretariat();
        $this->Main_model->alertPromt('You already rated this applicant', 'canNotReview');
    
        $data['positionsForInterview'] = json_encode($this->determinePositionsByLogedInUser()->result_array());

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

    public function determineIfProvincialSecretariat()
    {
        $employeeTable = $this->Main_model->get_where("employee", "credentials_id", $_SESSION['credentials_id'])->row();
        if ($employeeTable->user_role == 'secretariat' && $employeeTable->office_name == 'Management Services Division') {
            return 1;
        } else {
            return 0; // regional secretariat determined
        }
    }

    public function getAllInterviewsForSecretariat()
    {

        $isRegionalSecretariat = $this->determineIfProvincialSecretariat();

        if ($isRegionalSecretariat == 0) {
            $returnData = array();
            $ratedApplicants = $this->Main_model->get("rated_applicants", "employee_fullname");
            foreach ($ratedApplicants->result_array() as $row) {
                $row['title_location'] = $row['position_title'] . " : " . $row['plantilla_item_no'] . " : " . $row['employee_province'] . " - " . $row['employee_office_name'];
                array_push($returnData, $row);
            }
            echo json_encode($returnData);
            return;
        }

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
