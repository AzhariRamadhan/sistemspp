<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homesiswa extends CI_Controller {

	public function index() //
	{
		$this->model_security->getsecurity();
		$isi['content'] 	= 'siswa/tampilan_content';
		$isi['judul']		= 'Beranda';
		$isi['sub_judul']	= '';
		$this->load->view('siswa/tampilan_home',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('awal');
	}

}
