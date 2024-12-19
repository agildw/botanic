<?php 
 
class Order extends CI_Model{

    public function create_order($data){
        $this->db->insert('order', $data);
        return $this->db->insert_id();
    }

    public function get_orders($user_id = null){
        $this->db->select('order.*, order_detail.*, product.name as product_name, product.thumbnail as product_image');
        $this->db->from('order');
        $this->db->join('order_detail', 'order.id = order_detail.order_id');
        $this->db->join('product', 'order_detail.product_id = product.id');
        if ($user_id !== null) {
            $this->db->where('order.user_id', $user_id);
        }
        $this->db->order_by('order.id', 'desc');
        $query = $this->db->get();
        
        // map the result to a more readable format
        $orders = [];
        foreach ($query->result_array() as $row) {
            if (!isset($orders[$row['order_code']])) {
                $orders[$row['order_code']] = [
                    'order_code' => $row['order_code'],
                    'total_price' => $row['total_price'],
                    'status' => $row['status'],
                    'created_at' => $row['created_at'],
                    'products' => []
                ];
            }
            $orders[$row['order_code']]['products'][] = [
                'product_name' => $row['product_name'],
                'product_image' => $row['product_image'],
                'quantity' => $row['quantity'],
                'price' => $row['price']
            ];
        }
        return $orders;
    }


    public function get_order($order_id, $user_id = null){
        $this->db->select('order.*, order_detail.*, product.name as product_name, product.thumbnail as product_image');
        $this->db->from('order');
        $this->db->join('order_detail', 'order.id = order_detail.order_id');
        $this->db->join('product', 'order_detail.product_id = product.id');
        $this->db->where('order.id', $order_id);
        if ($user_id !== null) {
            $this->db->where('order.user_id', $user_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_order_by_code($order_code, $user_id = null){
        $this->db->select('order.*, order_detail.*, product.name as product_name, product.thumbnail as product_image, user.name as user_name, user.email as user_email');
        $this->db->from('order');
        $this->db->join('order_detail', 'order.id = order_detail.order_id');
        $this->db->join('product', 'order_detail.product_id = product.id');
        $this->db->join('user', 'order.user_id = user.id');
        $this->db->where('order.order_code', $order_code);
        if ($user_id !== null) {
            $this->db->where('order.user_id', $user_id);
        }
        $query = $this->db->get();
        
        $order = $query->row_array();
        if ($order) {
            $order['products'] = [];
            foreach ($query->result_array() as $row) {
                $order['products'][] = [
                    'product_name' => $row['product_name'],
                    'product_image' => $row['product_image'],
                    'quantity' => $row['quantity'],
                    'price' => $row['price']
                ];
            }
        }
        return $order;
    }

    public function update_order_by_code($order_code, $data){
        $this->db->where('order_code', $order_code);
        $this->db->update('order', $data);
    }

    public function delete_order_by_code($order_code){
        $this->db->where('order_code', $order_code);
        $this->db->delete('order');
    }
}
