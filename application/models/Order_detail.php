<?php 
 
class Order_detail extends CI_Model{
    private $table = 'order_detail';

    public function create_order_detail($data){
        return $this->db->insert($this->table, $data);
    }
}