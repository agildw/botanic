<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// function get_cart_total() {
//     $CI =& get_instance();
//     $cart = $CI->session->userdata('cart') ?? [];
//     $total = 0;
//     foreach ($cart as $item) {
//         $total += $item['price'] * $item['quantity'];
//     }
//     return $total;
// }

function get_cart_items() {
    $CI =& get_instance();
    $cart = $CI->session->userdata('cart') ?? [];

    // Fetch product details from database or predefined array
    $CI->load->model('product');
    foreach ($cart as $key => $item) {
        $product = $CI->product->get_product($item['id']);
        if ($product) {
            $cart[$key]['name'] = $product['name'];
            $cart[$key]['price'] = $product['price'];
            $cart[$key]['thumbnail'] = $product['thumbnail'];
            $cart[$key]['slug'] = $product['slug'];
        }
    }
    return $cart;
}

function get_cart_item_count() {
    $CI =& get_instance();
    $cart = $CI->session->userdata('cart') ?? [];
    $count = 0;
    foreach ($cart as $item) {
        $count += $item['quantity'];
    }
    return $count;
}