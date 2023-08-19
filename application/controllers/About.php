<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
   private function loadView($file, $data = null)
   {
      $this->load->view('frontend/parts/header.php');
      $this->load->view('frontend/' . $file, $data);
      $this->load->view('frontend/parts/footer.php');
   }

   public function index()
   {
      $this->loadView('about.php');
   }
}

/* End of file Controllername.php */
