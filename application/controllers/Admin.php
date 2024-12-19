<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
		
        // check role is ADMIN
        if($this->session->userdata('role') != 'ADMIN'){
            redirect(site_url());
        }

        $this->load->model('product');
        $this->load->model('user');
        $this->load->model('order');
	}

    public function index()
	{
        $data['products'] = $this->product->get_products();
        $data['users'] = $this->user->get_users();
        $data['orders'] = $this->order->get_orders();
        $data['admin_name'] = $this->session->userdata('name');
		$this->load->view('admin/dashboard', $data);
    }

    public function products(){
        $data['products'] = $this->product->get_products();
        $this->load->view('admin/products', $data);
    }
    
    public function delete_product($id){
        $result = $this->product->delete_product($id);
        if($result){
            $this->session->set_flashdata('message_success', 'Product berhasil dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'Product gagal dihapus');
        }
        redirect('admin/products');
    }

    public function update_product($id){
        $data['product'] = $this->product->get_product($id);
        if(!$data['product']){
            show_404();
        }
        $this->load->view('admin/update_product', $data);
    }

    public function update_product_action($id){
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $quantity = $this->input->post('quantity');
        $slug = $this->input->post('slug');
        $description = $this->input->post('description');


        $data = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
            'slug' => $slug
        ];

        $result = $this->product->update_product($id, $data);
        if($result){
            $this->session->set_flashdata('message_success', 'Product berhasil diupdate');
        } else {
            $this->session->set_flashdata('message_error', 'Product gagal diupdate');
        }
        redirect('admin/products');
    }

    public function users(){
        $data['users'] = $this->user->get_users();
        $this->load->view('admin/users', $data);
    }

    public function delete_user($id){
        $result = $this->user->delete_user($id);
        if($result){
            $this->session->set_flashdata('message_success', 'User berhasil dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'User gagal dihapus');
        }
        redirect('admin/users');
    }

    public function update_user($id){
        $data['user'] = $this->user->get_user($id);
        $this->load->view('admin/update_user', $data);
    }

    public function update_user_action($id){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $address = $this->input->post('address');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => $password,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'role' => $role
        ];

        $result = $this->user->update_user($id, $data);
        if($result){
            $this->session->set_flashdata('message_success', 'User berhasil diupdate');
        } else {
            $this->session->set_flashdata('message_error', 'User gagal diupdate');
        }
        redirect('admin/users');
    }

    public function add_product(){
        $this->load->view('admin/add_product');
    }

    public function add_product_action(){
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $quantity = $this->input->post('quantity');
        $slug = $this->input->post('slug');
        $description = $this->input->post('description');

        $data = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
            'slug' => $slug
        ];

        $result = $this->product->add_product($data);
        if($result){
            $this->session->set_flashdata('message_success', 'Product berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('message_error', 'Product gagal ditambahkan');
        }
        redirect('admin/products');
    }

    public function add_user(){
        $this->load->view('admin/add_user');
    }

    public function add_user_action(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $address = $this->input->post('address');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => $password,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'role' => $role
        ];

        $result = $this->user->add_user($data);
        if($result){
            $this->session->set_flashdata('message_success', 'User berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('message_error', 'User gagal ditambahkan');
        }
        redirect('admin/users');
    }

    public function orders(){
        $data['orders'] = $this->order->get_orders();
        $this->load->view('admin/orders', $data);
    }

    public function update_order($id){
        $data['order'] = $this->order->get_order_by_code($id);
        if(!$data['order']){
            show_404();
        }

        $this->load->view('admin/update_order', $data);
    }

    public function update_order_action($code){
        $status = $this->input->post('status');
        $total_price = $this->input->post('total_price');
        $payment_url = $this->input->post('payment_url');
        $payment_method = $this->input->post('payment_method');
        $paid_at = $this->input->post('paid_at');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $address = $this->input->post('address');

        $data = [
            'status' => $status,
            'total_price' => $total_price,
            'payment_url' => $payment_url,
            'payment_method' => $payment_method,
            'paid_at' => $paid_at,
            'name' => $name,
            'phone' => $phone,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'address' => $address
        ];

        $result = $this->order->update_order_by_code($code, $data);
        
        if($result){
            $this->session->set_flashdata('message_success', 'Order berhasil diupdate');
        } else {
            $this->session->set_flashdata('message_error', 'Order gagal diupdate');
        }
        redirect('admin/orders');
    }

    public function delete_order($code){
        $result = $this->order->delete_order_by_code($code);
        if($result){
            $this->session->set_flashdata('message_success', 'Order berhasil dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'Order gagal dihapus');
        }
        redirect('admin/orders');
    }

    public function add_order(){
        $data['users'] = $this->user->get_users();
        $data['products'] = $this->product->get_products();
        
        $this->load->view('admin/add_order', $data);
    }
}
