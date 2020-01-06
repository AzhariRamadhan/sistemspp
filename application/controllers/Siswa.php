<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		
		if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }


		//$this->load->model('Model_siswa');
		$this->model_security->getsecurity();
		$isi['content'] 	= 'admin/tampil_datasiswa';
		$isi['judul']		= 'Data';
		$isi['sub_judul']	= 'Siswa';
		$isi['data']		= $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_siswa.id_kelas")->get('tb_siswa');
		$isi["seluruhKelas"] = $this->db->get("tb_kelas");
		$isi['data_kelas']	= $this->db->get('tb_kelas');
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function simpan(){

        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$data1 = '';
		$tgl = $this->input->post('tanggal_lahir');
		$pecah = explode("-",$tgl);
            $tanggal = $pecah[2];
            $bulan = $pecah[1];
            $tahun = $pecah[0];
        $tgl = $tanggal.''.$bulan.''.$tahun;
		$this->load->model('Model_siswa');
	
		$this->load->helper('file');
		$this->load->library('upload');
		$config['upload_path']          = './uploads/fotosiswa';
        $config['allowed_types']        = 'png|jpg|jpeg';
        $config['max_size']             = 100000000;
        $config['max_width']            = 100000000;
		$config['file_name']            = $this->input->post('nis');
		$config["overwrite"]			= true;
        $this->upload->initialize($config);
        //file 1
        if ($this->upload->do_upload('foto1')){
            $data1 = $this->upload->data('file_name');
		}		
		
		// apabila admin menambahkan nis yang sama beri error 
		if($this->Model_siswa->cekNis($this->input->post("nis"))) {
			$this->session->set_flashdata('info','Maaf NIS yang anda inputkan sudah terdaftar');
			redirect("siswa");
		} else {



		$data = array(
			'nis'               => trim($this->input->post("nis")),
			'id_kelas'			=> trim($this->input->post("id_kelas")),
			'tahun_ajaran'		=> trim($this->input->post('tahun_ajaran')),
			'nama_siswa'		=> trim($this->input->post('nama_siswa')),
			'tanggal_lahir'		=> trim($this->input->post('tanggal_lahir')),
			'telpon'			=> trim($this->input->post('telepon')),
			'pw_siswa'			=> trim($tgl),
			'jenis_kelamin'		=> trim($this->input->post('jenis_kelamin')),
			'alamat'			=> trim($this->input->post('alamat')),
			'fotosiswa'			=> $data1
//
                	);



			$this->Model_siswa->simpan($data);
			redirect('siswa');
		}
	}

	public function ubah(){
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
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
			$this->session->set_flashdata('info','Maaf NIS yang anda inputkan sudah terdaftar');
			redirect("siswa");
		} else {
       //echo $data1;
		$data = array(
		            'nis'               => trim($this->input->post("nis")),
			'id_kelas'			=> trim($this->input->post("id_kelas")),
			'tahun_ajaran'		=> trim($this->input->post('tahun_ajaran')),
			        'nama_siswa'		=> trim($this->input->post('nama_siswa')),
			        'id_kelas'			=>  trim($this->input->post("id_kelas")),
			        'tanggal_lahir'		=> trim($this->input->post('tanggal_lahir')),
					'telpon'			=> trim($this->input->post('telepon')),
					'pw_siswa'			=> trim($this->input->post('passmhs')),
					'jenis_kelamin'		=> trim($this->input->post('jenis_kelamin')),
			        'alamat'			=> trim($this->input->post('alamat')),
			        'fotosiswa'			=> $data1
				);


			$this->Model_siswa->ubah(array('id_siswa' => $this->input->post('id_siswa_lama')), $data);
			redirect('siswa');
			}
	}

	public function Verifikasi($id, $status)
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->load->model('Model_siswa');
		if($status ==1){
			$status = 'Sudah';
		}else{
			$status = 'Belum';
		}
		$data = array (
			'Verifikasi'	=> $status
		);
		$this->Model_siswa->ubah(array('id_siswa' => $id), $data);
		redirect('siswa');
	}

	public function hapus($id)
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->load->model('Model_siswa');
		$this->model_security->getsecurity();

		$this->Model_siswa->hapus($id);
		redirect('siswa');
	}



}
