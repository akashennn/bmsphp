<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
	public function view($page = 'home')
	{
		if(!file_exists(APPPATH.'views/admins/'.$page.'.php')){
			show_404();
		}

		$data['title'] = ucfirst($page);
		$this->load->view('admins/'.$page, $data);

	}
}
