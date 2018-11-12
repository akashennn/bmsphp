<?php
class Book_model extends CI_Model {

    public function get_books(){
        $query = $this->db->get('books');
        return $query->result_array();
    }

    public function record_count() {
        return $this->db->count_all("books");
    }
  
    public function fetch_books($limit, $start) {
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

    public function search_book()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('title',$keyword); $this->db->or_like('author',$keyword);
        $query = $this->db->get('books');
        return $query->result_array();
    }

    function findAll()
    {
        return $this->db->get('books')->result();
    }

    function find($id)
    {
        return $this->db->where('id', $id)->get('books')->row();
    }

    public function get_views($id)
    {
        $this->db->select('view_count');
        $this->db->from('books');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_views($id, $view_count)
    {
        $data = array(
            'view_count' => $view_count+1
        );
    
        $this->db->where('id', $id);
        $this->db->update('books', $data);
    }

    public function user_tracking($id, $session_id)
    {
        $data = array(
            'book_id' => $id,
            'session_id' => $session_id
        );

        return $this->db->insert('user_tracking', $data);
    }

    public function get_pbooks($id)
    {
        $this->db->order_by('view_count', 'DESC');
        $query = $this->db->get('books', 6);
        $data = [];
        foreach ($query->result_array() as $row) {
            if($row['id'] === $id){
                FALSE;
            } else {
                if(sizeof($data) == 5){
                    FALSE;
                }else{
                    $data[] = $row;
                }

                // $data[] = $row;
            }
        }
        return $data;
    }
}