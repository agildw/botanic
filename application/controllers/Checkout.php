<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once(__DIR__ . '/vendor/autoload.php');


use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

Configuration::setXenditKey($_ENV['XENDIT_API_KEY']);



class Checkout extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		
        // if !logged in, redirect to login
        if(!$this->session->userdata('id')){
            redirect(site_url('auth/login'));
        }

        // if cart is empty, redirect to products
        if(get_cart_item_count() == 0){
            redirect(site_url('products'));
        }
	}

    private function calculate_subtotal($cart) {
        // print_r($cart);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    public function index(){
        $this->load->model('user');

        $cart = get_cart_items();
        $subtotal = $this->calculate_subtotal($cart);
        $user = $this->user->get_user($this->session->userdata('id'));

        $this->load->view('checkout', ['cart' => $cart, 'subtotal' => $subtotal, 'user' => $user]);
    }

    public function process(){
        $apiInstance = new InvoiceApi();
        
        $this->load->model('order');
        $this->load->model('order_detail');

    
        $cart = get_cart_items();
        $subtotal = $this->calculate_subtotal($cart);
        

        $name = $this->input->post('full_name');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        $zip = $this->input->post('postal_code');
        $city = $this->input->post('city');
        $state = $this->input->post('state');

        $email = $this->session->userdata('email');

        
            
        $order_code = $this->generate_order_code();


        $create_invoice_request = new Xendit\Invoice\CreateInvoiceRequest([
            'external_id' => 'botanic-' . time(),
            'payer_email' => $email,
            'amount' => $subtotal,
            'invoice_duration' => 3600,
            'currency' => 'IDR',
            'description' => 'Pembayaran pesanan di Botanic',
            'success_redirect_url' => site_url('orders/' . $order_code),
            // items from cart
            'items' => array_map(function($item){
                return [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ];
            }, $cart),
            'customer' => [
                'given_names' => $name,
                'phone_number' => $phone,
            ]
        ]); // \Xendit\Invoice\CreateInvoiceRequest


        $response = $apiInstance->createInvoice($create_invoice_request);

        $order_data = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'zip' => $zip,
            'city' => $city,
            'state' => $state,
            'total_price' => $subtotal,
            'order_code' => $order_code,
            'user_id' => $this->session->userdata('id'),
            'payment_url' => $response->getInvoiceUrl(),
            'expired_at' => gmdate('Y-m-d H:i:s', time() + 3600 + 7 * 3600)
        ];


        $order_id = $this->order->create_order($order_data);

        foreach ($cart as $item) {
            $order_detail_data = [
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
            $this->order_detail->create_order_detail($order_detail_data);
        }

        $this->session->set_userdata('cart', []);
        redirect($response->getInvoiceUrl());



        // redirect(site_url('order/' . $order_code));
    }

    private function generate_order_code(){
        return 'botanic-' . time();
    }
    
}
