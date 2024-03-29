<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function index()
    {
        if($this->session->has_userdata('cart'))
        {
            $data['items'] = array_values(unserialize($this->session->userdata('cart')));            
        } else {
            $this->session->set_flashdata('message', "Please add items to the cart first!");
            redirect('books/index','refresh');
        }

        $data['total'] = $this->total();

		$this->load->view('templates/header');
        $this->load->view('cart/index', $data);
		$this->load->view('templates/footer');
    }

    public function buy($id)
    {
        $product = $this->book_model->find($id);
        $item = array(
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'stock_available' => 1
        );
        if(!$this->session->has_userdata('cart')) {
            $cart = array($item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->userdata('cart')));
            if($index == -1) {
                array_push($cart, $item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $cart[$index]['stock_available']++;
                $this->session->set_userdata('cart', serialize($cart));
            }
        }
        redirect('cart');
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        redirect('cart');
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function total() {
        $items = array_values(unserialize($this->session->userdata('cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['price'] * $item['stock_available'];
        }
        return $s;
    }
}