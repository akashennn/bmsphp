<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	public function index()
	{
		$data['title'] = 'List of Books';
		// $data['cat'] = $this->book_model->get_books();
		
		$this->load->model('book_model');
		$this->load->library('pagination');

		$config = array();
		$config["base_url"] = base_url() . "books/index";
		$config["total_rows"] = $this->book_model->record_count();
		$config["per_page"] = 6;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["cat"] = $this->book_model->fetch_departments($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('templates/header');
		$this->load->view('books/index', $data);
		$this->load->view('templates/footer');

		// print_r($data['cat']);

	}

	public function view($id)
	{	
		$data['title'] = 'Details of book';
		$data['cat'] = $this->book_model->get_book($id);
		$data['pbooks'] = $this->book_model->get_popular_books();
		$data['products'] = $this->book_model->find($id);
		$data['views'] = $this->book_model->get_views($id);
				

		$this->load->model('book_model');
		$this->load->view('templates/header');
		$this->load->view('books/view', $data);
		$this->load->view('templates/footer');
		$this->book_model->update_views($id,$data['views']['view_count']);

		$session_id = session_id();
		$this->book_model->user_tracking($id, $session_id);

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

	public function search()
	{
		$data['keyword'] = $this->input->post('keyword');
		$data['cat'] = $this->book_model->search_book();
		$this->load->model('book_model');
		$this->load->view('templates/header');
		$this->load->view('books/result', $data);
		$this->load->view('templates/footer');

		// print_r($data['cat']);
	}
}
