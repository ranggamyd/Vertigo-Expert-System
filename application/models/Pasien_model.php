<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{
   private $_table = "pasien";
   const SESSION_KEY = 'pasien_id';


   public function rules()
   {
      return [
         [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
         ],
         [
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required'
         ],
         [
            'field' => 'jk',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'
         ]
      ];
   }

   public function all()
   {
      $query = $this->db->query('SELECT p.nama, p.alamat, p.JK, p.tanggal, dh.presentase, dp.nama_penyakit FROM pasien p JOIN detail_hasil dh ON p.id = dh.id_pasien JOIN penyakit dp ON dh.id_penyakit = dp.id WHERE dh.presentase = ( SELECT MAX(presentase) FROM detail_hasil WHERE id_pasien = p.id );');
      return $query->result();
   }


   public function get($id)
   {
      $this->db->where('id', $id);
      $query = $this->db->get($this->_table);
      return $query->row();
   }

   public function create($nama, $alamat, $jk)
   {
      $data = [
         'nama' => $nama,
         'alamat' => $alamat,
         'JK' => $jk
      ];
      $this->db->insert($this->_table, $data);
      return $this->db->insert_id();
   }

   public function login($id)
   {
      $this->session->set_userdata([self::SESSION_KEY => $id]);

      return $this->session->has_userdata(self::SESSION_KEY);
   }

   public function current_user()
   {
      if (!$this->session->has_userdata(self::SESSION_KEY)) {
         return null;
      }

      $user_id = $this->session->userdata(self::SESSION_KEY);
      $query = $this->db->get_where($this->_table, ['id' => $user_id]);
      return $query->row();
   }

   public function total()
   {
      return $this->db->count_all($this->_table);
   }
}
