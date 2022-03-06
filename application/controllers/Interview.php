<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interview extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function determineIfRaterCanRateThisApplicant($plantillaItemNumber, $applicantId, $employeeId)
    {
        $where['applicant_id'] = $applicantId;
        $where['plantilla_item_no'] = $plantillaItemNumber;
        $where['employee_id'] = $employeeId;
        // $this->Main_model->showNormalArray($where);
        $query = $this->Main_model->multiple_where("rated_applicants", $where)->result_array();
        if ($query != null) {
            return true; // merong nakita
        } else {
            return false; // walang nakita
        }
    }

    public function secondForm()
    {
        $salaryGrade = $this->input->get('salary_grade');
        $applicant_id = $this->input->get('applicant_id');
        $plantilla_no = $this->input->get('plantilla_no');
        $employeeId = $this->Credentials_model->getUserId();

        $applicantIsAlreadyRated = $this->determineIfRaterCanRateThisApplicant($plantilla_no, $applicant_id, $employeeId);

        if ($applicantIsAlreadyRated) $this->Main_model->notifyAndRedirect('canNotReview', 'InterviewRatingManagement');

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

    public function getRaterUserRole($employeeId)
    {
        return $this->Main_model->get_where('employee', "employee_id", $employeeId)->row()->user_role;
    }

    public function sendPost()
    {
        $employeeId = $this->Credentials_model->getUserId();
        $employeeProvince = $this->Main_model->get_where("employee", "employee_id", $employeeId)->row()->province;
        $insert['applicant_id'] = $this->input->post('applicant_id');
        $insert['interviewed_by'] = $employeeId;
        $insert['rater_user_role'] = $this->getRaterUserRole($employeeId);
        $insert['province_of_rater'] = $this->Main_model->get_where("employee", "employee_id", $employeeId)->row()->province;
        $insert['applicant_info'] = json_encode($this->Main_model->get_where("applicant", "applicant_id", $this->input->post('applicant_id'))->result_array());
        $insert['plantilla_item_no'] = $this->input->post('plantilla_item_no');
        $insert['total_score_a'] = $this->input->post('total_score_a');
        $insert['total_score_b'] = $this->input->post('total_score_b');
        $insert['total'] = $this->input->post('total');
        $insert['answers'] = $this->input->post('answers');
        $insert['date_interviewed'] = date("Y-m-d");
        // $insert['dd_title'] = $this->input->post("dd_title");
        $this->Main_model->_insert("interview", $insert);
        // $this->Main_model->showNormalArray($insert);        
        
        $employeeTable = $this->Main_model->get_where('employee', 'employee_id', $employeeId)->row();
        $applicantTable = $this->Main_model->get_where('applicant', 'applicant_id', $this->input->post('applicant_id'))->row();
        $positionTitle = $this->Main_model->get_where('position', 'plantilla_item_no', $this->input->post('plantilla_item_no'))->row()->position_title;


        $employeeFullName = "$employeeTable->firstname $employeeTable->middlename $employeeTable->lastname";
        $applicantFullName = "$applicantTable->firstname $applicantTable->middlename $applicantTable->lastname";

        $positionTable = $this->Main_model->get_where("position", "plantilla_item_no", $insert['plantilla_item_no'])->row();

        $ratedApplicants['employee_id'] = $employeeId;
        $ratedApplicants['employee_fullname'] = $employeeFullName;
        $ratedApplicants['applicant_id'] = $this->input->post('applicant_id');
        $ratedApplicants['applicant_fullname'] = $applicantFullName;
        $ratedApplicants['plantilla_item_no'] = $this->input->post('plantilla_item_no');
        $ratedApplicants['position_title'] = $positionTitle;
        $ratedApplicants['employee_province'] = $positionTable->province;
        $ratedApplicants['employee_office_name'] = $positionTable->office_name;
        $this->Main_model->_insert("rated_applicants", $ratedApplicants);
        // $this->Main_model->showNormalArray($ratedApplicants);
    }

    public function updatePlantillaNumberOfApplicant()
    {
        // $applicant_id = $this->input->post('applicant_id');

        // $update['position_applied_for'] = $this->input->post('position_applied_for'); // will receive what is left after client side processes
        // $this->Main_model->_update('applicant', 'applicant_id', $applicant_id, $update);
    }

    public function firstForm()
    {
        $salaryGrade = $this->input->get('salary_grade');
        $applicant_id = $this->input->get('applicant_id');
        $plantilla_no = $this->input->get('plantilla_no');
        $employeeId = $this->Credentials_model->getUserId();

        $applicantIsAlreadyRated = $this->determineIfRaterCanRateThisApplicant($plantilla_no, $applicant_id, $employeeId);
        if ($applicantIsAlreadyRated) $this->Main_model->notifyAndRedirect('canNotReview', 'InterviewRatingManagement');

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
