<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	

	public function ambillogin($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tb_admin');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$sess = array(
					'username' => $row->username,
					'password' => $row->password,
					'level' => 'admin'
							);
			}
				$this->session->set_userdata($sess);
				redirect('home');
		}
		else
		{
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('login');
		}
	}

	public function ambillogin2($username,$tgl_lahir)
	{
		$this->db->where('nis',$username);
		$this->db->where('pw_siswa', $tgl_lahir);
		$query = $this->db->get('tb_siswa');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$sess = array(
					'username' => $row->nama_siswa,
					'password' => $row->pw_siswa,
					'nis' => $row->nis,
					'foto' => $row->fotosiswa,
					'level' => 'siswa'
							);
			}
				$this->session->set_userdata($sess);
				redirect('Spp_siswa');
		}
		else
		{
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('loginsiswa');
		}
	}
	

	public function ambillogin3($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tb_kepsek');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$sess = array(
					'username' => $row->username,
					'password' => $row->password,
					'level' => 'kepsek'
							);
			}
				$this->session->set_userdata($sess);
				redirect('Kepsek');
		}
		else
		{
			$this->session->set_flashdata('info','maaf username atau password salah');
			redirect('Kepseklogin');
		}
	}
}
