<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model
{

    function findAll()
    {
        return $this->db->get('books')->result();
    }

    function find($id)
    {
        return $this->db->where('id', $id)->get('books')->row();
    }

}