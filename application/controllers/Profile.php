<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {	
    public function __construct() { 
        parent::__construct(); 
        $this->load->model('user');

        if (!$this->session->userdata('id')) {
            redirect('auth/login');
        }
    }
	public function index()
	{
        $data['user'] = $this->user->get_user($this->session->userdata('id'));
		$this->load->view('profile', $data);	
	}

    public function update_profile()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip', 'Zip Code', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('profile');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'zip' => $this->input->post('zip')
            ];



            $this->user->update_user($this->session->userdata('id'), $data);

            // update session data
            $user = $this->user->get_user($this->session->userdata('id'));
            $session_data = [
                'id' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name'],
                'role' => $user['role']
            ];

            $this->session->set_userdata($session_data);

            $this->session->set_flashdata('success', 'Profile updated successfully');
            redirect('profile');
        }
    }

    public function change_password()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_password', validation_errors());
            redirect('profile');
        } else {
            $user = $this->user->get_user($this->session->userdata('id'));
            if (!password_verify($this->input->post('current_password'), $user['password'])) {
                $this->session->set_flashdata('error_password', 'Current password is incorrect');
                redirect('profile');
            }

            $data = [
                'password' => $this->input->post('new_password')
            ];

            $this->user->update_user($this->session->userdata('id'), $data);
            $this->session->set_flashdata('success_password', 'Password updated successfully');
            redirect('profile');
        }
    }

}
