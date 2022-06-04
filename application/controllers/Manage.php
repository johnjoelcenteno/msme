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

    public function getForms()
    {
        echo json_encode($this->Main_model->get('msme', 'msme_id')->result_array());
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

    public function addRecordPost()
    {
        $firstname = $this->input->post('firstname');
        $middlename = $this->input->post('middlename');
        $lastname = $this->input->post('lastname');

        $insert['firstname'] = $firstname;
        $insert['middlename'] = $middlename;
        $insert['lastname'] = $lastname;
        $insert['fullname'] = "$firstname $middlename $lastname";
        $insert['barangay'] = $this->input->post('barangay');
        $insert['city'] = $this->input->post('city');
        $insert['province'] = $this->input->post('province');
        $insert['category'] = $this->input->post('category');
        $insert['mayors_permit_registration'] = $this->input->post('mayors_permit_registration');
        $insert['bnr'] = $this->input->post('bnr');
        $insert['mayors_permit_number'] = $this->input->post('mayors_permit_number');
        $insert['enterprise_development_track'] = $this->input->post('enterprise_development_track');
        $insert['classification_by_sector'] = $this->input->post('classification_by_sector');
        $insert['industry_sector'] = $this->input->post('industry_sector');
        $insert['classification_size'] = $this->input->post('classification_size');
        $insert['owner_gender'] = $this->input->post('owner_gender');
        $insert['profile'] = $this->input->post('profile');
        $insert['technical_advisory_services_provided'] = $this->input->post('technical_advisory_services_provided');
        $insert['date_of_services'] = $this->input->post('date_of_services');
        $insert['date_created'] = date("Y-m-d");

        $this->Main_model->_insert('msme', $insert);
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

    public function update()
    {
        $msmeId = $this->input->get('id');
        $msmeTable = $this->Main_model->get_where('msme', 'msme_id', $msmeId)->row();
        $data['msmeTable'] = json_encode($msmeTable);
        $data['msme_id'] = $msmeTable->msme_id;
        $params['viewName'] = 'updateMsme';
        $params['pageTitle'] = '';
        $params['renderedData'] = $data;

        $this->load->library('view_manipulation', $params);
        $this->view_manipulation->renderViewWithLayout();
    }

    public function updatePost()
    {
        $msmeId = $this->input->post('msme_id');
        $_POST = array_splice($_POST, 1, count($_POST));

        $this->Main_model->_update('msme', 'msme_id', $msmeId, $_POST);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->Main_model->_delete("msme", "msme_id", $id);
        redirect('Manage');
    }
}
