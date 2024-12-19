<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once(__DIR__ . '/vendor/autoload.php');


use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;

Configuration::setXenditKey($_ENV['XENDIT_API_KEY']);

class Webhook extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('order');
    }

    public function index(){
        $callbackToken = $this->input->get_request_header('X-CALLBACK-TOKEN', TRUE);
        $expectedToken = $_ENV['XENDIT_WEBHOOK_TOKEN'];
        

        if($callbackToken != $expectedToken){
            http_response_code(403);
            echo 'Invalid token';
            return;
        }
        $input = file_get_contents('php://input');
        $event = json_decode($input, true);

        $order_code = $event['external_id'];
        $payment_method = $event['payment_method'];
        $paid_at = $event['paid_at'];
        $status = $event['status'];

        $order = $this->order->get_order_by_code($order_code);

        if(!$order){
            http_response_code(404);
            echo 'Order not found';
            return;
        }

        // if order status already paid but webhook status not PAID, ignore
        if($order['status'] == 'PAID' && $status != 'PAID'){
            http_response_code(200);
            return;
        }

        $data = [
            'payment_method' => $payment_method,
            'paid_at' => $paid_at,
            'status' => $status
        ];
        

        $this->order->update_order_by_code($order_code, $data);

        http_response_code(200);
        echo 'Success';
        
    }
}