<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
   public function index()
   {
      $data = $this->db->get('penyakit')->result();
      $this->load->model('pasien_model');
      $this->load->library('form_validation');

      $rules = $this->pasien_model->rules();
      $this->form_validation->set_rules($rules);

      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $jk = $this->input->post('jk');

      if ($this->form_validation->run()) {
         $id_pasien = $this->pasien_model->create($nama, $alamat, $jk);
         $this->pasien_model->login($id_pasien);

         $this->session->set_flashdata('sukses', 'Data Berhasil Di isi');
         redirect('diagnosa/responseForm');
      }

      $this->load->view('frontend/parts/header.php');
      $this->load->view('frontend/diagnosa/index.php', compact('data', 'nama', 'alamat', 'jk'));
      $this->load->view('frontend/parts/footer.php');
   }

   public function responseForm()
   {
      $this->load->model('gejala_model');
      $this->load->model('pasien_model');
      $this->load->model('penyakit_gejala_model');
      $this->load->model('detail_hasil_model');
      $data = $this->db->get('gejala')->result();
      $gejala = $this->input->post('gejala');

      if ($gejala) {
         $jumlah = [];
         foreach ($gejala as $id_gejala => $value) {
            if ($value == 'Ya') {
               $_gejala = $this->gejala_model->get($id_gejala);
               $cf = $_gejala->bobot;

               $penyakit = $this->penyakit_gejala_model->getGejala($id_gejala);
               foreach ($penyakit as $_penyakit) {
                  $id_penyakit = $_penyakit->id_penyakit;
                  $jumlah[$id_penyakit] = @$jumlah[$id_penyakit] ?? 0;
                  $jumlah[$id_penyakit] = $jumlah[$id_penyakit] + $cf * (1 - $jumlah[$id_penyakit]);
               }
            }
         }

         $pasien = $this->pasien_model->current_user();
         foreach ($jumlah as $id_penyakit => $presentase) {
            $this->detail_hasil_model->create($pasien->id, $id_penyakit, $presentase * 100);
         }

         $this->db->order_by('presentase', 'desc');
         $detail_hasil = $this->db->get_where('detail_hasil', ['id_pasien' => $pasien->id])->row();
         $this->db->insert('hasil', ['id_pasien' => $pasien->id, 'id_penyakit' => $detail_hasil->id_penyakit, 'presentase' => $detail_hasil->presentase]);

         redirect('diagnosa/hasil');
      }

      $this->load->view('frontend/parts/header.php');
      $this->load->view('frontend/diagnosa/responseForm', compact('data'));
      $this->load->view('frontend/parts/footer.php');
   }

   public function hasil()
   {
      $this->load->model('pasien_model');
      $this->load->model('penyakit_model');
      $this->load->model('detail_hasil_model');

      $penyakit = "";
      $kategori = "";
      $solusi = "";
      $pasien = $this->pasien_model->current_user();

      $detail_hasil = $this->detail_hasil_model->get($pasien->id);
      $presentase = 0;
      foreach ($detail_hasil as $hasil) {
         if ($hasil->presentase > $presentase) {
            $penyakit = $hasil->nama_penyakit;
            $kategori = $hasil->nama_kategori;
            $solusi = $hasil->solusi;
            $presentase = $hasil->presentase;
         }
      }

      $this->load->view('frontend/parts/header.php');
      $this->load->view('frontend/diagnosa/hasil.php', compact('pasien', 'penyakit', 'presentase', 'solusi', 'kategori', 'detail_hasil'));
      $this->load->view('frontend/parts/footer.php');
   }
}

/* End of file Data_diri.php */
