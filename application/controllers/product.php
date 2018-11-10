<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        $this->load->view('product/index', $data);
    }

}