<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

   public function index()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('admin_model');
      $this->load->model('kategori_model');
      $this->load->model('penyakit_model');
      $this->load->model('gejala_model');
      $this->load->model('pasien_model');

      $kategori = $this->kategori_model->total();
      $penyakit = $this->penyakit_model->total();
      $gejala = $this->gejala_model->total();
      $diagnosa = $this->pasien_model->total();

      $this->load->view('admin/parts/header.php', ['title' => 'Dashboard', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/dashboard.php', compact('kategori', 'penyakit', 'gejala', 'diagnosa'));
      $this->load->view('admin/parts/footer.php');
   }
}

/* End of file dashboard.php */
