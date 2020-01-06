<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepseklogin extends CI_Controller {

	public function index()
	{
		//if($this->session->userdata('username') != 'kepsek')
		//{
		//	show_404();
		//}
		//$this->model_security->getsecurity();
		//$isi['content']		= 'kepsek/tampilan_contents';
		//$isi['judul']		= 'Beranda';
		//$isi['sub_judul'] 	= '';
		$this->load->view('kepsek/tampilan_loginn');
	}


	public function getlogin3()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('model_login');
		$this->model_login->ambillogin3($username,$password);
	}
}
