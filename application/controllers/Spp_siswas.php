<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp_siswas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("siswa/model_upload");
        $this->load->library('form_validation');
        $this->model_security->getsecurity();
    }

	public function index()
	{

		$isi['content'] 	= 'siswa/tampil_dataspp';
		$isi['judul']		= 'Data';
		$isi['sub_judul']	= 'Pembayaran Tiap Bulan';
		$isi['data']		= $this->db->query('SELECT tb_kelas.kode_kelas, id_pembayaran, p_tahun, p_bulan,  (jumlah_bayar) as jumlah_bayar_1, (jumlah_bayar + jumlah_bayar_2)
 AS jumlah_bayar, jumlah_bayar_2 FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.id_siswa = tb_siswa.id_siswa 
 INNER JOIN tb_kelas ON tb_kelas.id_kelas = tb_pembayaran.id_kelas WHERE tb_siswa.nis = ' .
            $this->session->userdata("nis") . ' ORDER BY p_tahun, p_bulan;')
        ->result();
		$this->load->view('siswa/tampilan_home',$isi);
	}

	public function tambah()
	{

		$isi['content'] 	= 'siswa/form_upload';
		$isi['judul']		= 'siswa';
		$isi['sub_judul']	= 'Tambah skripsi';
		$isi['data2']		= $this->model_upload->get_dosen();
		$this->load->view('siswa/tampilan_home',$isi);
	}


	public function bukti()
	{
		$isi['content'] 	= 'siswa/bukti';
		$isi['judul']		= 'Data';
		$isi['sub_judul']	= 'Skripsi';
		$isi['data']		= $this->db->query('SELECT * FROM tb_pembayaran join tb_siswa on tb_siswa.nis=tb_pembayaran.nis WHERE tb_siswa.nis='.$this->session->userdata('nis'))->result();
		$this->load->view('siswa/tampilan_home',$isi);
	}

	public function cetak()
	{
        $nis = $this->input->get("nis");
        $bulan = $this->input->get("bulan");
        $tahun = $this->input->get("tahun");
        $isi["bulan"] = $bulan;
        $isi["tahun"] = $tahun;
        $isi["data_siswa"] =  $this->db->query('SELECT nama_siswa, nis FROM tb_siswa WHERE nis = ' . $nis)->result();

        $isi["data"] = $this->db->query('SELECT tanggal_bayar, id_pembayaran, p_tahun, p_bulan, 
 (jumlah_bayar + jumlah_bayar_2) as jumlah_bayar, tb_kelas.kode_kelas FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.id_siswa = 
  tb_siswa.id_siswa INNER JOIN tb_kelas ON tb_kelas.id_kelas = tb_pembayaran.id_kelas WHERE tb_siswa.nis = ' . $nis . ' AND p_bulan = '
            .$bulan.' AND p_tahun = '.$tahun.';')->result();


        $this->load->view("siswa/bukti_upload", $isi);
	}

	public function download($id)
	{
			$this->load->helper('download');
			$fileinfo = $this->model_upload->download($id);
			$file = 'uploads/file/'.$fileinfo['jurnal'];
			force_download($file, NULL);
	}

	public function download2($id)
	{
			$this->load->helper('download');
			$fileinfo = $this->model_upload->download($id);
			$file = 'uploads/file/'.$fileinfo['laporan'];
			force_download($file, NULL);
	}

}	
