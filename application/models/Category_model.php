<?php
class Category_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function get_categories(){
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    
    public function get_category($id)
    {
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row_array();
    }

    public function create_category()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'image_url' => $this->input->post('image_url')
        );
        return $this->db->insert('categories',$data);
    }
}