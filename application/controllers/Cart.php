<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cart extends CI_Controller {

    private function calculate_subtotal($cart) {
        // print_r($cart);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    public function index(){
        $cart = get_cart_items();
        $subtotal = $this->calculate_subtotal($cart);
        $this->load->view('cart', ['cart' => $cart, 'subtotal' => $subtotal]);
    }

	public function add_to_cart() {
        $this->load->model('product');

        $product_id = $this->input->post('product_id');
        $quantity = (int) $this->input->post('quantity');

        // Fetch product details from database or predefined array
        $product = $this->product->get_product($product_id);

        if ($product) {
            $cart = $this->session->userdata('cart') ?? [];
            
            $cart_item_key = array_search($product_id, array_column($cart, 'id'));
            

            if ($cart_item_key !== false) {
                // Update quantity if the product is already in the cart
                $cart[$cart_item_key]['quantity'] += $quantity;
            } else {
                // Add new product to cart
                $cart[] = [
                    'id' => $product['id'],
                    // 'name' => $product['name'],
                    // 'price' => $product['price'],
                    'quantity' => $quantity,
                ];
            }



            $this->session->set_userdata('cart', $cart);

            echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found']);
        }
    }

    public function update_quantity() {
        $cart = get_cart_items();
        $id = $this->input->post('id');
        $quantity = (int) $this->input->post('quantity');

        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = max(1, $quantity); // Ensure quantity is at least 1
                break;
            }
        }

        $this->session->set_userdata('cart', $cart);
        echo json_encode(['success' => true, 'subtotal' => $this->calculate_subtotal($cart)]);
    }

    public function remove_item() {
        $cart = get_cart_items();
        $id = $this->input->post('id');

        $cart = array_filter($cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        $this->session->set_userdata('cart', $cart);
        echo json_encode(['success' => true, 'subtotal' => $this->calculate_subtotal($cart)]);
    }

    
}
