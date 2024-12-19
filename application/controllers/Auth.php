<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
	{
		redirect(site_url());
    }

	public function login()
	{
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->login_rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('auth/login');
		}

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		

		$result = $this->auth_model->login($email, $password);
		
		if($result){
			return redirect('/');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
		}

		$this->load->view('auth/login');
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}

	public function register(){
		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->register_rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('auth/register');
		}

		
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'phone' => $this->input->post('phone'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'address' => $this->input->post('address')
		];

		$result = $this->auth_model->register($data);

		if($result){
			$this->session->set_flashdata('message_register_success', 'Register Berhasil, silahkan login!');
			return redirect('auth/login');
		} else {
			$this->session->set_flashdata('message_register_error', 'Register Gagal, email sudah terdaftar!');
		}

		// if($this->auth_model->register($data)){
		// 	$this->session->set_flashdata('message_register_success', 'Register Berhasil, silahkan login!');
		// 	redirect('auth/login');
		// } else {
		// 	$this->session->set_flashdata('message_register_error', 'Register Gagal, email sudah terdaftar!');
		// }

		
	}
}