<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Books';
		$data['cat'] = $this->category_model->get_categories();
		
		$this->load->model('Category_model');
		$this->load->view('templates/header');
		$this->load->view('books/index', $data);
		$this->load->view('templates/footer');

		// print_r($data['cat']);

	}
}
