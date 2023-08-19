<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_hasil_model extends CI_Model
{
   private $_table = "detail_hasil";

   public function get($id)
   {
      $this->db->select('detail_hasil.*, nama_penyakit, nama_kategori, solusi');

      $this->db->where('id_pasien', $id);
      $this->db->join('penyakit', 'penyakit.id = id_penyakit');
      $this->db->join('kategori', 'kategori.id = penyakit.id_kategori');

      $this->db->order_by('presentase', 'desc');
      $query = $this->db->get($this->_table);
      return $query->result();
   }

   public function create($id_pasien, $id_penyakit, $presentase)
   {
      $data = [
         'id_pasien' => $id_pasien,
         'id_penyakit' => $id_penyakit,
         'presentase' => $presentase
      ];
      $this->db->insert($this->_table, $data);
   }
}
