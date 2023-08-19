<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{
   private $_table = "penyakit";

   public function rules()
   {
      return [
         [
            'field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'required'
         ],
         [
            'field' => 'solusi',
            'label' => 'Solusi',
            'rules' => 'required'
         ],
         [
            'field' => 'kode_penyakit',
            'label' => 'Kode Penyakit',
            'rules' => 'required'
         ],
         [
            'field' => 'nama_penyakit',
            'label' => 'Nama Penyakit',
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

   public function create($kategori, $solusi, $kode_penyakit, $nama_penyakit, $deskripsi)
   {
      $data = [
         'id_kategori' => $kategori,
         'solusi' => $solusi,
         'deskripsi' => $deskripsi,
         'kode_penyakit' => $kode_penyakit,
         'nama_penyakit' => $nama_penyakit
      ];
      $this->db->insert($this->_table, $data);

      return $this->db->insert_id();
   }

   public function edit($id, $kategori, $solusi, $kode_penyakit, $nama_penyakit, $deskripsi)
   {
      $data = [
         'id_kategori' => $kategori,
         'solusi' => $solusi,
         'deskripsi' => $deskripsi,
         'kode_penyakit' => $kode_penyakit,
         'nama_penyakit' => $nama_penyakit
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
