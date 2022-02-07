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
        $data['provinceAndDivision'] = $this->Credentials_model->getProvinceDivision();

        $params['viewName'] = 'reports';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    function determineIfReportAlreadySubmitted()
    {
        $where['created_by'] = $this->Credentials_model->getUserId();
        $where['date_created'] = date("Y-m-d");
        $this->db->select("*");
        $this->db->from("report_logs");
        $this->db->join("reports", "report_logs.reference_number = reports.reference_number");
        $this->db->where($where);
        $result = $this->db->get()->result_array();

        echo count($result) != 0 ? json_encode($result) : "empty";
    }

    public function create()
    {
        $userId = $this->Credentials_model->getUserId();
        $referenceNumber = $this->input->post("reference_number");

        // populate report_logs table
        $reportLogs['report_logs_id'] = $this->Main_model->createGuid();
        $reportLogs['reference_number'] = $referenceNumber;
        $reportLogs['date_created'] = date("Y-m-d");
        $reportLogs['created_by'] = $userId;

        $this->Main_model->_insert("report_logs", $reportLogs);

        $reports['reports_id'] = $this->Main_model->createGuid();
        $reports['province_id'] = $this->input->post('province_id');
        $reports['division_id'] = $this->input->post('division_id');
        $reports['report_details'] = json_encode($_POST);
        $reports['reference_number'] = $referenceNumber;

        $this->Main_model->_insert("reports", $reports);
    }

    public function update()
    {
        $userId = $this->Credentials_model->getUserId();
        $referenceNumber = $this->input->post("reference_number");

        // populate report_logs table
        $reportLogs['date_modified'] = date("Y-m-d");
        $reportLogs['modified_by'] = $userId;

        $this->Main_model->_update("report_logs", "reference_number", $referenceNumber, $reportLogs);

        $reports['report_details'] = json_encode($_POST);

        $this->Main_model->_update("reports", "reference_number", $referenceNumber, $reports);
    }
}
