<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
   public function index()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $data = $this->db->get('kategori')->result();

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Kategori', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/kategori/index.php', compact('data'));
      $this->load->view('admin/parts/footer.php');
   }

   public function create()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('kategori_model');
      $this->load->library('form_validation');

      $rules = $this->kategori_model->rules();
      $this->form_validation->set_rules($rules);

      $kode_kategori = $this->input->post('kode_kategori');
      $nama_kategori = $this->input->post('nama_kategori');
      $deskripsi = $this->input->post('deskripsi');

      if ($this->form_validation->run()) {
         $this->kategori_model->create($kode_kategori, $nama_kategori, $deskripsi);

         $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
         redirect('admin/kategori');
      }

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Kategori', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/kategori/create.php', compact('kode_kategori', 'nama_kategori', 'deskripsi'));
      $this->load->view('admin/parts/footer.php');
   }

   public function edit($id)
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('kategori_model');
      $this->load->library('form_validation');

      $rules = $this->kategori_model->rules();
      $this->form_validation->set_rules($rules);

      $kategori = $this->kategori_model->get($id);

      if (!$kategori) {
         redirect('admin/kategori');
      }
      $kode_kategori = $this->input->post('kode_kategori') ?? $kategori->kode_kategori;
      $nama_kategori = $this->input->post('nama_kategori') ?? $kategori->nama_kategori;
      $deskripsi = $this->input->post('deskripsi') ?? $kategori->deskripsi;

      if ($this->form_validation->run()) {
         $this->kategori_model->edit($id, $kode_kategori, $nama_kategori, $deskripsi);

         $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
         redirect('admin/kategori');
      }

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Kategori', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/kategori/edit.php', compact('kode_kategori', 'nama_kategori', 'deskripsi'));
      $this->load->view('admin/parts/footer.php');
   }

   public function delete($id)
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('kategori_model');
      $kategori = $this->kategori_model->get($id);

      if ($kategori) {
         $this->kategori_model->delete($id);
         $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
      }

      redirect('admin/kategori');
   }
}
