<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
   private $_table = "gejala";

   public function rules()
   {
      return [
         [
            'field' => 'kode_gejala',
            'label' => 'Kode Gejala',
            'rules' => 'required'
         ],
         [
            'field' => 'nama_gejala',
            'label' => 'Nama Gejala',
            'rules' => 'required'
         ],
         [
            'field' => 'bobot',
            'label' => 'Bobot',
            'rules' => 'required'
         ],
      ];
   }

   public function get($id)
   {
      $this->db->where('id', $id);
      $query = $this->db->get($this->_table);
      return $query->row();
   }

   public function create($kode_gejala, $nama_gejala, $bobot)
   {
      $data = [
         'kode_gejala' => $kode_gejala,
         'nama_gejala' => $nama_gejala,
         'bobot' => $bobot,
      ];
      $this->db->insert($this->_table, $data);
   }

   public function edit($id, $kode_gejala, $nama_gejala, $bobot)
   {
      $data = [
         'kode_gejala' => $kode_gejala,
         'nama_gejala' => $nama_gejala,
         'bobot' => $bobot
      ];
      $this->db->set($data);
      $this->db->where('id', $id);
      $this->db->update($this->_table);
   }

   public function delete($id)
   {

      $this->db->where('id', $id);
      $this->db->delete($this->_table);
   }

   public function total()
   {
      return $this->db->count_all($this->_table);
   }
}
