<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signout extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}

	public function index()
    {
        session_destroy();
        redirect("SignIn");
    }
}
