<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
   private $_table = "kategori";

   public function rules()
   {
      return [
         [
            'field' => 'kode_kategori',
            'label' => 'Kode Kategori',
            'rules' => 'required'
         ],
         [
            'field' => 'nama_kategori',
            'label' => 'Nama Kategori',
            'rules' => 'required'
         ],
         [
            'field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'
         ]
      ];
   }

   public function get($id)
   {
      $this->db->where('id', $id);
      $query = $this->db->get($this->_table);
      return $query->row();
   }

   public function create($kode_kategori, $nama_kategori, $deskripsi)
   {
      $data = [
         'kode_kategori' => $kode_kategori,
         'nama_kategori' => $nama_kategori,
         'deskripsi' => $deskripsi
      ];
      $this->db->insert($this->_table, $data);
   }

   public function edit($id, $kode_kategori, $nama_kategori, $deskripsi)
   {
      $data = [
         'kode_kategori' => $kode_kategori,
         'nama_kategori' => $nama_kategori,
         'deskripsi' => $deskripsi
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
