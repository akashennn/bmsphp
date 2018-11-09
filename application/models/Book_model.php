<?php
class Book_model extends CI_Model {

    public function get_books(){
        $query = $this->db->get('books');
        return $query->result_array();
    }
    
    public function get_book($id)
    {
        $query = $this->db->get_where('books', array('id' => $id));
        return $query->row_array();
    }

    public function create_book()
    {
        $slug = url_title($this->input->post('title'));

        $data = array(
            'slug' => $slug,
            'details' => $this->input->post('details'),
            'category_id' => $this->input->post('category_id'),
            'price' => $this->input->post('price'),
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'view_count' => $this->input->post('view_count'),
            'image_url' => $this->input->post('image_url')
        );
        return $this->db->insert('books',$data);
    }
}