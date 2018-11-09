<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		$data['title'] = 'List of Books';
		$data['cat'] = $this->book_model->get_books();
		
		$this->load->model('book_model');
		$this->load->view('templates/header');
		$this->load->view('books/index', $data);
		$this->load->view('templates/footer');

		// print_r($data['cat']);

	}

	public function view($id)
	{	
		$data['title'] = 'Details of book';
		$data['cat'] = $this->book_model->get_book($id);

		$this->load->model('book_model');
		$this->load->view('templates/header');
		$this->load->view('books/view', $data);
		$this->load->view('templates/footer');

		print_r($data['cat']);

	}

	public function create()
	{	
		$data['title'] = 'Add New Book';
		$data['cat'] = $this->category_model->get_categories();
		$this->form_validation->set_rules('title','title','required');
		// $this->form_validation->set_rules('id','Id','required');

		if($this->form_validation->run() === FALSE){
		
			$this->load->model('Category_model');
			$this->load->model('Book_model');
			$this->load->view('templates/header');
			$this->load->view('books/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->model('Book_model');
			$this->book_model->create_book();
			redirect('categories');
		}
	}
}
