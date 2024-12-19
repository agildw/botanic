<?php 
 
class Product extends CI_Model{
	function get_products(){
        $query = $this->db->get('product');
        // return as array
        return $query->result();
    }

    function get_product($id){
        $query = $this->db->get_where('product', ['id' => $id]);
        return $query->row_array();
    }

    function get_latest_products(){
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get('product');
        return $query->result_array();
    }

    function delete_product($id){
        $this->db->where('id', $id);
        return $this->db->delete('product');
    }

    function update_product($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('product', $data);
    }

    function get_product_by_slug($slug){
        $query = $this->db->get_where('product', ['slug' => $slug]);
        return $query->row_array();
    }

    function add_product($data){
        return $this->db->insert('product', $data);
    }

    function get_random_products($exclude = null){
        if ($exclude) {
            $this->db->where_not_in('id', $exclude);
        }
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(4);
        $query = $this->db->get('product');
        return $query->result_array();
    }
}
