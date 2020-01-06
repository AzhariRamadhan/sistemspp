<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != 'kepsek')
        {
            show_404();
        }
		$this->model_security->getsecurity();
		$isi['content'] 	= 'kepsek/tampilan_contents';
		$isi['judul']		= 'Beranda';
		$isi['sub_judul']	= '';
		$this->load->view('kepsek/t_home',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('awal');
	}

}
