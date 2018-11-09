<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Book Categories';
		$data['cat'] = $this->category_model->get_categories();
		
		$this->load->model('Category_model');
		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');

		// print_r($data['cat']);

	}

	public function view($id)
	{	
		$data['title'] = 'List of Books';
		$data['cat'] = $this->category_model->get_category($id);

		$this->load->model('Category_model');
		$this->load->view('templates/header');
		$this->load->view('categories/view', $data);
		$this->load->view('templates/footer');

		print_r($data['cat']);

	}

	public function create()
	{	
		$data['title'] = 'Add New Category';

		$this->form_validation->set_rules('id','Id','required');
		$this->form_validation->set_rules('id','Id','required');

		if($this->form_validation->run() === FALSE){
			
			$this->load->model('Category_model');
			$this->load->view('templates/header');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->category_model->create_category();
			$this->load->model('Category_model');
			redirect('categories');
		}
	}
}
