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
		// $data['cat'] = $this->category_model->get_category_books($id);
		
		$this->load->model('category_model');
		$data['catid'] = $this->category_model->get_category_name($id);

		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = base_url() . "category/view/$id/";
		$config["total_rows"] = $this->category_model->record_count($id);
		$config["per_page"] = 6;
		$config["uri_segment"] = 4;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data["cat"] = $this->category_model->fetch_books($config["per_page"], $page, $id);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );


		$this->load->model('Category_model');
		$this->load->view('templates/header');
		$this->load->view('categories/view', $data);
		$this->load->view('templates/footer');

		// print_r($data['cat']);


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
			$this->load->model('Category_model');
			$this->category_model->create_category();
			redirect('categories');
		}
	}
}
