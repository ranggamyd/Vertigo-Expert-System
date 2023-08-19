<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penyakit extends CI_Controller
{
   public function index()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      // $data = $this->db->get('penyakit')->result();
      $this->db->select('penyakit.*, nama_kategori');
      $this->db->from('penyakit');
      $this->db->join('kategori', 'kategori.id = penyakit.id_kategori');
      $data = $this->db->get()->result();

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Penyakit', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/penyakit/index.php', compact('data'));
      $this->load->view('admin/parts/footer.php');
   }

   public function create()
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('penyakit_model');
      $this->load->model('kategori_model');
      $this->load->model('penyakit_gejala_model');
      $this->load->library('form_validation');

      $data_kategori = $this->db->get('kategori')->result();
      $data_gejala = $this->db->get('gejala')->result();


      $rules = $this->penyakit_model->rules();
      $this->form_validation->set_rules($rules);

      $kode_penyakit = $this->input->post('kode_penyakit');
      $nama_penyakit = $this->input->post('nama_penyakit');
      $kategori = $this->input->post('kategori');
      $deskripsi = $this->input->post('deskripsi');
      $solusi = $this->input->post('solusi');
      $gejala = $this->input->post('gejala[]');

      if ($this->form_validation->run()) {
         $id_penyakit = $this->penyakit_model->create($kategori, $solusi, $kode_penyakit, $nama_penyakit, $deskripsi);


         foreach ($gejala as $id_gejala) {
            $this->penyakit_gejala_model->create($id_penyakit, $id_gejala);
         }

         $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
         redirect('admin/penyakit');
      }

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Penyakit', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/penyakit/create.php', compact('data_gejala', 'data_kategori', 'kategori', 'solusi', 'kode_penyakit', 'nama_penyakit', 'deskripsi'));
      $this->load->view('admin/parts/footer.php');
   }

   public function edit($id)
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('penyakit_model');
      $this->load->model('kategori_model');
      $this->load->model('penyakit_gejala_model');
      $this->load->library('form_validation');

      $data_kategori = $this->db->get('kategori')->result();
      $data_gejala = $this->db->get('gejala')->result();
      $data_gejala_check = $this->db->where('id_penyakit', $id)->get('penyakit_gejala')->result();


      $rules = $this->penyakit_model->rules();
      $this->form_validation->set_rules($rules);

      $penyakit = $this->penyakit_model->get($id);

      if (!$penyakit) {
         redirect('admin/gejala');
      }
      $kode_penyakit = $this->input->post('kode_penyakit') ?? $penyakit->kode_penyakit;
      $nama_penyakit = $this->input->post('nama_penyakit') ?? $penyakit->nama_penyakit;
      $kategori = $this->input->post('kategori') ?? $penyakit->id_kategori;
      $deskripsi = $this->input->post('deskripsi') ?? $penyakit->deskripsi;
      $solusi = $this->input->post('solusi') ?? $penyakit->solusi;
      $gejala = $this->input->post('gejala[]');


      if ($this->form_validation->run()) {
         $this->penyakit_model->edit($id, $kategori, $solusi, $kode_penyakit, $nama_penyakit, $deskripsi);

         $this->penyakit_gejala_model->delete($id);
         foreach ($gejala as $id_gejala) {
            $this->penyakit_gejala_model->create($id, $id_gejala);
         }

         $this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
         redirect('admin/penyakit');
      }

      $this->load->model('admin_model');
      $this->load->view('admin/parts/header.php', ['title' => 'Penyakit', 'user' => $this->admin_model->current_user()]);
      $this->load->view('admin/penyakit/edit.php', compact('data_gejala_check', 'data_gejala', 'data_kategori', 'kategori', 'solusi', 'kode_penyakit', 'nama_penyakit', 'deskripsi'));
      $this->load->view('admin/parts/footer.php');
   }

   public function delete($id)
   {
      if (!$this->session->userdata('admin_id')) redirect('auth/login');

      $this->load->model('penyakit_model');
      $penyakit = $this->penyakit_model->get($id);

      if ($penyakit) {
         $this->penyakit_model->delete($id);
         $this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
      }

      redirect('admin/penyakit');
   }
}

/* End of file gejala.php */
