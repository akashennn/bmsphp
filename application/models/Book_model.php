<?php
class Book_model extends CI_Model {

    public function get_books(){
        $query = $this->db->get('books');
        return $query->result_array();
    }

    public function record_count() {
        return $this->db->count_all("books");
    }
  
    public function fetch_departments($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("books");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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
            'image_url' => $this->input->post('image_url')
        );
        return $this->db->insert('books',$data);
    }

    public function get_popular_books()
    {
        $this->db->order_by('view_count', 'DESC');
        $query = $this->db->get('books', 5);
        return $query->result_array();
    }

    public function search_book()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('title',$keyword); $this->db->or_like('author',$keyword);
        $query = $this->db->get('books');
        return $query->result_array();
    }
}