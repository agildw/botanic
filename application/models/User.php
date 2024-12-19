<?php 
 
class User extends CI_Model{
	function get_users(){
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('user');
        return $query->result();
    }

    function get_user($id){
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }

    function delete_user($id){
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    function update_user($id, $data){
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    function add_user($data){
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->insert('user', $data);
    }
}
