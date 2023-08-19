<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
   private function loadView($file, $data = null)
   {
      $this->load->view('frontend/parts/header');
      $this->load->view('frontend/' . $file, $data);
      $this->load->view('frontend/parts/footer');
   }

   public function index()
   {
      $this->loadView('home');
   }
}
