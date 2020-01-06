<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kelas extends CI_Model {


	public function simpan($data){
		$this->db->insert('tb_kelas', $data);
		return $this->db->insert_id();
	}

	public function ubah($where, $data){
	    $this->db->update('tb_kelas', $data, $where);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_kelas');
	}

}