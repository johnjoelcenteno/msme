<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportLogs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
    }

    public function index()
    {
        $data = array();
        $params['viewName'] = 'reportLogs';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function getReportLogs()
    {
        $this->db->select("*");
        $this->db->from("report_logs");
        $this->db->join("reports", "reports.reference_number = report_logs.reference_number");
        $this->db->join("users", "report_logs.created_by = users.users_id");
        $result = $this->db->get();

        echo $result != false ? json_encode($result->result_array()) : array();
    }
}
