<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin'))
			redirect('admin');
	}
	function index()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer');
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}
}