<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Diagnosa extends CI_Controller
{
   public function index()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');
      // $this->load->model('pasien_model');

      // $data = $this->pasien_model->all();
      $this->db->join('pasien', 'pasien.id = hasil.id_pasien', 'left');
      $this->db->join('penyakit', 'penyakit.id = hasil.id_penyakit', 'left');
      $this->db->order_by('tanggal', 'desc');
      $data = $hasil_diagnosa = $this->db->get('hasil')->result_array();

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Diagnosa', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/diagnosa/index.php', compact('data'));
      $this->load->view('admin/parts/footer.php');
   }
}
