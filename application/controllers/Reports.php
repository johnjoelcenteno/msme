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
        $data = array();
        $params['viewName'] = 'manage_reports/reports';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

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
