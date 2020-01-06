<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_upload extends CI_Model {



	public function getdata(){

		$data = "SELECT * FROM tb_pembayaran JOIN tb_siswa on tb_siswa.nis=tb_pembayaran.nis 
			WHERE tb_pembayaran.tanggal_bayar='$_SESSION[username]'";

		return $this->db->query($data);

	}

	public function get_dosen(){
		$query = $this->db->query('SELECT * FROM tb_dosen');
		return $query->result_array();
	}

	public function simpan($data){
		$this->db->insert('tb_skripsi2', $data);
		return $this->db->insert_id();
	}

	public function get_id($id){
		$this->db->from('tb_skripsi2');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query;
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('tb_skripsi',$data);
	}

	public function download($id)
	{
		$query = $this->db->get_where('tb_skripsi2',array('id'=>$id));
		return $query->row_array();
	}
	
}	