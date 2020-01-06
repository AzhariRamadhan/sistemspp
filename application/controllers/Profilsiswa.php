<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilsiswa extends CI_Controller {

	public function index()
	{
		
		$this->model_security->getsecurity();
		$isi['content'] 	= 'siswa/tampil_datasiswa';
		$isi['judul']		= 'Data';
		$isi['sub_judul']	= 'Siswa';
		$isi['data']		= $this->db->query('SELECT * FROM tb_siswa WHERE nis='. $this->session->userdata('nis')) ->result();
		$this->load->view('siswa/tampilan_home',$isi);

	}
/*
	public function simpan(){
	
		$data1 = '';
		$this->load->model('Model_siswa');
		$this->load->helper('file');
		$this->load->library('upload');
		$config['upload_path']          = './uploads/fotosiswa';
        $config['allowed_types']        = 'png|jpg|jpeg';
        $config['max_size']             = 6000;
        $config['max_width']            = 6000;
        $config['file_name']            = $this->input->post('foto');
        $this->upload->initialize($config);
        //file 1
        if ($this->upload->do_upload('foto')){
            $data1 = $this->upload->data('file_name');
        }		

		$data = array(
			        'tahun_ajaran'		=> $this->input->post('tahun_angkatan'),
					'telpon'			=> $this->input->post('telepon'),
					'pw_siswa'			=> $this->input->post('passmhs'),
					'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
			        'alamat'			=> $this->input->post('alamat'),
			        'fotosiswa'			=> $data1
				);

		$this->Model_siswa->simpan($data);
		redirect('profilsiswa');
	}*/

	public function ubah(){

		$data1 = '';
		$this->load->model('Model_siswa');
		$this->load->helper('file');
		$this->load->library('upload');
		$config['upload_path']          = './uploads/fotosiswa';
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['max_size']             = 100000000;
		$config['max_width']            = 100000000;
		$config['file_name']            = $this->input->post('foto');
		$config["overwrite"]			= true;
		$this->upload->initialize($config);
		//file 1
		if ($this->upload->do_upload('foto1')){
			$data1 = $this->upload->data('file_name');
		}

		if($this->input->post("nis") !== $this->input->post("nis_lama") && $this->Model_siswa->cekNis($this->input->post("nis"))) {
			$this->session->set_flashdata('info','Maaf nis sudah ada');
			redirect("profilsiswa");
		} else {
			//echo $data1;
			$data = array(
				'nis'               => $this->input->post("nis"),
				'tahun_ajaran'		=> $this->input->post('tahun_ajaran'),
				'nama_siswa'		=> $this->input->post('nama_siswa'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'telpon'			=> $this->input->post('telepon'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'alamat'			=> $this->input->post('alamat'),
				'fotosiswa'			=> $data1
			);


			$this->Model_siswa->ubah(array('id_siswa' => $this->input->post('id_siswa_lama')), $data);
			redirect('profilsiswa');
		}
	}

}
