<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginsiswa extends CI_Controller {

	public function index()
	{
		$this->load->view('siswa/tampilan_login');
	}

	public function getlogin2()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('tgl_lahir');
		$this->load->model('model_login');
		$this->model_login->ambillogin2($username,$password);
	}
}
