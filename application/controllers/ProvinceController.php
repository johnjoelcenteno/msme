<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProvinceController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
    }

    public function index()
    {
        echo json_encode($this->Main_model->get("province", "province_id")->result_array());
    }
}
