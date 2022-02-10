<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Offices extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'manage_offices/index';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function create()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'manage_offices/create';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function createPost()
    {
        $create['office_name'] = $this->input->post("office_name");
        $create['province'] = $this->input->post("province");
        $this->Main_model->_insert("offices", $create);
    }

    public function destroy()
    {
        $request = json_decode(file_get_contents('php://input'));

        $this->Main_model->_delete("offices", "office_id", $request->office_id);
    }

    public function getOffices()
    {
        echo json_encode($this->Main_model->get("offices", "office_id")->result_array());
    }

    public function update()
    {
        $officeId = $this->input->get("id");

        $result = $this->Main_model->get_where("offices", "office_id", $officeId)->row();

        $data['queryData'] = $result;

        $params['viewName'] = 'manage_offices/update';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function updatePost()
    {
        $officeId = $this->input->post("office_id");
        $officeName  = $this->input->post("office_name");
        $province = $this->input->post("province");

        $update['office_name'] = $officeName;
        $update['province'] = $province;
        $this->Main_model->_update("offices", "office_id", $officeId, $update);
    }
}
