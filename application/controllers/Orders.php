<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order');

        if(!$this->session->userdata('id')){
            redirect(site_url('auth/login'));
        }
	}

	public function index()
	{
		$user_id = $this->session->userdata('id');
		$data['orders'] = $this->order->get_orders($user_id);
		
		$this->load->view('orders/orders', $data);		
	}

    public function order($id){
        $data['order'] = $this->order->get_order_by_code($id, $this->session->userdata('id'));
		if(!$data['order']){
			show_404();
		}

        $this->load->view('orders/order_details', $data);
    }
    

}
