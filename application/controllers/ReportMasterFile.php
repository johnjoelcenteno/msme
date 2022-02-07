<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportMasterFile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
    }

    public function index()
    {
        $data = array();
        $params['viewName'] = 'reportMasterFile';
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

    public function queryReportsByProvinceAndDivision($provinceId, $divisionId)
    {
        if ($provinceId == 6) {
            $this->db->select("*");
            $this->db->from("report_logs");
            $this->db->join("reports", "reports.reference_number = report_logs.reference_number");
            $this->db->join("users", "report_logs.created_by = users.users_id");
            $this->db->join("province", "reports.province_id = province.province_id");
            $this->db->join("division", "reports.division_id = division.division_id");
            return $this->db->get();
        }

        $where['province_id'] = $provinceId;
        $where['division_id'] = $divisionId;
        $this->db->select("*");
        $this->db->from("report_logs");
        $this->db->join("reports", "reports.reference_number = report_logs.reference_number");
        $this->db->join("users", "report_logs.created_by = users.users_id");
        $this->db->where($where);
        return $this->db->get();
    }

    public function getReportsForDivision()
    {
        $provinceAndDivision = $this->Credentials_model->getProvinceDivision()->row();
        $provinceId = $provinceAndDivision->province_id;
        $divisionId = $provinceAndDivision->division_id;

        $reports = $this->queryReportsByProvinceAndDivision($provinceId, $divisionId)->result_array();

        echo json_encode($reports);
    }

    public function viewReports()
    {
        $referenceId = $this->input->get("reference_id");
        $this->db->select("*");
        $this->db->from("report_logs");
        $this->db->join("reports", "reports.reference_number = report_logs.reference_number");
        $this->db->join("users", "report_logs.created_by = users.users_id");
        $this->db->join("province", "reports.province_id = province.province_id");
        $this->db->join("division", "reports.division_id = division.division_id");
        $this->db->where("reports.reference_number", $referenceId);
        $result = $this->db->get()->result_array()[0];

        $params['viewName'] = 'reportDetails';
        $params['pageTitle'] = '';
        $params['renderedData'] = $result;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }
}
