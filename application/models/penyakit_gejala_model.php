<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_gejala_model extends CI_Model
{
   private $_table = "penyakit_gejala";

   public function getPenyakit($id)
   {
      $this->db->where('id_penyakit', $id);
      $query = $this->db->get($this->_table);
      return $query->result();
   }

   public function getGejala($id)
   {
      $this->db->where('id_gejala', $id);
      $query = $this->db->get($this->_table);
      return $query->result();
   }

   public function create($id_penyakit, $id_gejala)
   {
      $data = [
         'id_penyakit' => $id_penyakit,
         'id_gejala' => $id_gejala,
      ];
      $this->db->insert($this->_table, $data);
   }

   public function edit($kategori, $solusi, $nama_penyakit, $deskripsi)
   {
      $data = [
         'kategori' => $kategori,
         'solusi' => $solusi,
         'deskripsi' => $deskripsi,
         'nama_penyakit' => $nama_penyakit
      ];
      $this->db->set($data);
      $this->db->where('id', $id);
      $this->db->update($this->_table);
   }

   public function delete($id)
   {

      $this->db->where('id_penyakit', $id);
      $this->db->delete($this->_table);
   }
   public function total()
   {
      return $this->db->count_all($this->_table);
   }
}
