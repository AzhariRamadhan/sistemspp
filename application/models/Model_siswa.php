<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model {


	function simpan($data){


		$this->db->insert('tb_siswa', $data);
		return $this->db->insert_id();
	}

	function ubah($where, $data){
	    $this->db->update('tb_siswa', $data, $where);
		return $this->db->affected_rows();
	}

	function hapus($id){
		$this->db->where('id_siswa',$id);
		$this->db->delete('tb_siswa');
	}

	function cekNis($nis){
		$hasil = $this->db->where("nis", $nis)->get("tb_siswa");

		if($hasil->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}
}
