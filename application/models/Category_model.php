<?php
class Category_model extends CI_Model {
    
    public function get_categories(){
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    
    public function get_category_books($id)
    {
        $query = $this->db->get_where('books', array('category_id' => $id));
        return $query->result_array();
    }

    public function get_category_name($id)
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

    public function record_count($id) {
        return $this->db->count_all('books', array('category_id' => $id));
    }

    public function fetch_books($limit, $start, $id) {
        // $query = $this->db->get_where($table_name,$where_array, $limit, $offset);
        $query = $this->db->get_where("books", array('category_id' => $id),$limit, $start);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return $query->result_array();
    }
}