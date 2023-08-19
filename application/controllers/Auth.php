<?php

class Auth extends CI_Controller
{
   public function index()
   {
      show_404();
   }

   public function login()
   {
      if ($this->session->userdata('admin_id')) redirect('dashboard');

      $this->load->model('admin_model');
      $this->load->library('form_validation');


      $rules = $this->admin_model->rules();
      $this->form_validation->set_rules($rules);

      
      if ($this->form_validation->run() == FALSE) {
         return $this->load->view('admin/login');
      }
      
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      
      if ($this->admin_model->login($username, $password)) {
         redirect('admin/dashboard');
      } else {
         $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
      }

      $this->load->view('admin/login');
   }

   public function logout()
   {
      $this->load->model('admin_model');
      $this->admin_model->logout();
      redirect(site_url());
   }
}
