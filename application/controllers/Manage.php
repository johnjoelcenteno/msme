<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    public function index()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'accounts';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function addRecord()
    {
        $data['guid'] = $this->Main_model->createGuid();

        $params['viewName'] = 'createMsme';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function changePassword()
    {
        $currentPassword = $this->input->post("current_password");
        $newPassword = $this->input->post("new_password");

        $credentials_id = $_SESSION['credentials_id'];
        $result = $this->Main_model->get_where("credentials", "credentials_id", $credentials_id)->row();

        if ($result->password == $this->Main_model->passwordEncryptor($currentPassword)) {
            echo "valid";

            $update['password'] = $this->Main_model->passwordEncryptor($newPassword);
            $this->Main_model->_update("credentials", "credentials_id", $_SESSION['credentials_id'], $update);
        } else {
            echo "invalid";
        }
    }
}
