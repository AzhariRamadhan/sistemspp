<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->model_security->getsecurity();
		$isi['content'] 	= 'admin/tampil_kelas';
		$isi['judul']		= 'Data';
		$isi['sub_judul']	= 'Kelas';
		$isi['data']		= $this->db->get('tb_kelas');
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function simpan()
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->load->model('Model_kelas');
        if($this->db->where("kode_kelas", $this->input->post('kode_kelas'))->get("tb_kelas")->num_rows() > 0) {
            $this->session->set_flashdata('info','Maaf Nama kelas yang anda inputkan sudah terdaftar');

            redirect("Kelas");
        }
		$data = array(
					'kode_kelas'		=> $this->input->post('kode_kelas'),
			        'wali_kelas'		=> $this->input->post('wali_kelas')
				);
		
		$this->Model_kelas->simpan($data);
		redirect('kelas');
	}
	public function ubah()
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
        if($this->db->where("kode_kelas", $this->input->post('kode_kelas'))->where("id_kelas !=", $this->input->post('id_kelas_lama'))->get("tb_kelas")->num_rows() > 0) {
            $this->session->set_flashdata('info','Maaf Nama kelas yang anda inputkan sudah terdaftar');

            redirect("Kelas");
        }
		$this->load->model('Model_kelas');

		$data = array(
			'kode_kelas'		=> $this->input->post('kode_kelas'),
			'wali_kelas'		=> $this->input->post('wali_kelas')
				);

		$this->Model_kelas->ubah(array('id_kelas' => $this->input->post('id_kelas_lama')), $data);
		redirect('kelas');
	}

	public function hapus($id)
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }


		$this->load->model('Model_kelas');

		$this->Model_kelas->hapus($id);
		redirect('kelas');
	}

}
