<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info_penyakit extends CI_Controller
{
   private function loadView($file, $data = null)
   {
      $this->load->view('frontend/parts/header.php');
      $this->load->view('frontend/' . $file, $data);
      $this->load->view('frontend/parts/footer.php');
   }

   public function index()
   {
      $this->db->select('penyakit.*, nama_kategori');
      $this->db->from('penyakit');
      $this->db->join('kategori', 'kategori.id = penyakit.id_kategori');
      $data = $this->db->get()->result();
      $this->loadView('info_penyakit.php', compact('data'));
   }
}

/* End of file Info_penyakit.php */
