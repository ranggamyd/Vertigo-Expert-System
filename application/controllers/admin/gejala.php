<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gejala extends CI_Controller
{
   public function index()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $data = $this->db->get('gejala')->result();

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Gejala', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/gejala/index.php', compact('data'));
      $this->load->view('admin/parts/footer.php');
   }

   public function create()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('gejala_model');
      $this->load->library('form_validation');

      $rules = $this->gejala_model->rules();
      $this->form_validation->set_rules($rules);

      $kode_gejala = $this->input->post('kode_gejala');
      $nama_gejala = $this->input->post('nama_gejala');
      $bobot = $this->input->post('bobot');

      if ($this->form_validation->run()) {
         $this->gejala_model->create($kode_gejala, $nama_gejala, $bobot);

         $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
         redirect('admin/gejala');
      }

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Gejala', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/gejala/create.php', compact('kode_gejala', 'nama_gejala', 'bobot'));
      $this->load->view('admin/parts/footer.php');
   }

   public function edit($id)
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('gejala_model');
      $this->load->library('form_validation');

      $rules = $this->gejala_model->rules();
      $this->form_validation->set_rules($rules);

      $gejala = $this->gejala_model->get($id);

      if (!$gejala) {
         redirect('admin/gejala');
      }
      $kode_gejala = $this->input->post('kode_gejala') ?? $gejala->kode_gejala;
      $nama_gejala = $this->input->post('nama_gejala') ?? $gejala->nama_gejala;
      $bobot = $this->input->post('bobot') ?? $gejala->bobot;

      if ($this->form_validation->run()) {
         $this->gejala_model->edit($id, $kode_gejala,  $nama_gejala, $bobot);

         $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
         redirect('admin/gejala');
      }

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Gejala', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/gejala/edit.php', compact('kode_gejala', 'nama_gejala', 'bobot'));
      $this->load->view('admin/parts/footer.php');
   }

   public function delete($id)
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('gejala_model');
      $gejala = $this->gejala_model->get($id);

      if ($gejala) {
         $this->gejala_model->delete($id);
         $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
      }

      redirect('admin/gejala');
   }
}

/* End of file gejala.php */
