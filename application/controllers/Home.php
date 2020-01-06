<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->model_security->getsecurity();
		$isi['content'] 	= 'admin/tampilan_content';
		$isi['judul']		= 'Beranda';
		$isi['sub_judul']	= '';
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('awal');
	}

}
