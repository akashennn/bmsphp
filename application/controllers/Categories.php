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

	public function add()
	{	
		$data['title'] = 'Add New Category';
		$this->load->view('templates/header');
		$this->load->view('categories/add', $data);
		$this->load->view('templates/footer');

		print_r($data);

	}
}
