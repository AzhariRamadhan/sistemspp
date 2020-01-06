<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->model_security->getsecurity();
    }

	public function index()
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
        if($this->db->get("tb_kelas")->num_rows() <= 0){
            $this->session->set_flashdata('info','Maaf kelas belum ada silahkan menambahkan kelas terlebih dahulu sebelum anda menambahkan SPP');
            redirect("kelas");
        }

		$isi['content'] 	= 'admin/tampil_pembayaran';
		$isi['judul']		= 'Data';
		$isi['sub_judul']	= 'Pembayaran SPP';
		if($this->session->userdata('level') == 'admin'){
		$isi['data_siswa']	= $this->db->get_where('tb_siswa', array('Verifikasi'=>'Sudah'));
		$isi['data']		= $this->db->query("SELECT * from tb_pembayaran inner join tb_siswa on tb_siswa.id_siswa = tb_pembayaran.id_siswa inner join tb_kelas 
on tb_pembayaran.id_kelas = tb_kelas.id_kelas  ")->result();
		$isi['data_kelas']	= $this->db->get('tb_kelas');
		}else{
		$isi['data']		= $this->db->query("SELECT * from tb_siswa where nis=".$this->session->userdata('nis'))->result();
		}
		$this->load->view('admin/tampilan_home',$isi);
	}

	/*public function laporan()
	{

		$isi['content'] 	= 'admin/tampilan_laporan';
		$isi['judul']		= 'Data'; 
		$isi['sub_judul']	= 'Pembayaran SPP';
		if($this->session->userdata('level') == 'admin'){
		$isi['data']		= $this->db->get('tb_siswa');
		$isi['data_siswa']	= $this->db->get('tb_siswa');
		// $isi['data_kelas']	= $this->db->get('tb_kelas');
		}else{
		$isi['data']		= $this->db->where('nis', $this->session->userdata('nis'))->get('tb_pembayaran');
		}
		$this->load->view('admin/tampilan_home',$isi);
	}*/

	public function simpan()
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->load->model('Model_pembayaran');
		$data = array(
					'id_siswa'				=> $this->input->post('id_siswa'),
					'id_kelas'              => $this->input->post("id_kelas"),
					'tanggal_bayar'		=> $this->input->post("tgl_pembayaran"),
			        'jumlah_bayar'		=> $this->input->post('jumlah_tagihan'),
                    'jumlah_bayar_2'	=> $this->input->post("jumlah_tagihan_2"),
                    'p_bulan' => $this->input->post("p_bulan"),
					'p_tahun' => $this->input->post("p_tahun"),
				);

		if($this->Model_pembayaran->bolehDataPembayaranDitambahkan($this->input->post('id_siswa'),
			$this->input->post("p_tahun"), $this->input->post("p_bulan"), "cek")) {

			if ($this->Model_pembayaran->cekApakahJmlPembayaranBerlebih($this->input->post('id_siswa'),

				$this->input->post('jumlah_tagihan') + $this->input->post('jumlah_tagihan_2'))) {
				$this->Model_pembayaran->simpan($data);
				redirect('spp');
			} else {

				$this->session->set_flashdata("info", "Gagal menambahkan pembayaran karena di bulan yang dimasukan, siswa ini total pembayarannya
		    melebihi 145000 atau kurang dari 0 dari jumlah pembayaran yang akan ditambahkan");
				redirect('spp');
			}

		} else {
			$this->session->set_flashdata("info", "Gagal menambahkan pembayaran karena data pembayaran siswa ini di tahun dan bulan di inputkan telah ada");
			redirect('spp');
		}

	}

	public function ubah()
	{
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->load->model('Model_pembayaran');

		$data = array(
			'id_siswa'			=> $this->input->post('id_siswa'),
			'id_kelas'          => $this->input->post("id_kelas"),
			'jumlah_bayar'		=> $this->input->post('jumlah_tagihan'),
			'jumlah_bayar_2'	=> $this->input->post("jumlah_tagihan_2"),
			'tanggal_bayar' => $this->input->post("tgl_pembayaran"),
            'p_bulan' => $this->input->post("p_bulan"),
            'p_tahun' => $this->input->post("p_tahun")
				);
		if($this->Model_pembayaran->bolehDataPembayaranDitambahkan($this->input->post('id_siswa'),
			$this->input->post("p_tahun"), $this->input->post("p_bulan"), $this->input->post('id_pembayaran'))) {

			if ($this->Model_pembayaran->cekApakahJmlPembayaranBerlebih(
				$this->input->post('jumlah_tagihan') + $this->input->post('jumlah_tagihan_2'))) {

				$this->Model_pembayaran->ubah(array('id_pembayaran' => $this->input->post('id_pembayaran')), $data);
				redirect('spp');
			} else {
				$this->session->set_flashdata("info", "Gagal menambahkan pembayaran karena di bulan yang dimasukan, siswa ini total pembayarannya
		    melebihi 145000 atau kurang dari 0 dari jumlah pembayaran yang akan ditambahkan");
				redirect('spp');
			}

		} else {
			$this->session->set_flashdata("info", "Gagal menambahkan pembayaran karena data pembayaran siswa ini di tahun dan bulan di inputkan telah ada");
			redirect('spp');
		}

	}

	public function hapus($id){
        if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->db->where('id_pembayaran',$id);
		$this->db->delete('tb_pembayaran');
		redirect('spp');
	}

	// public function verfikasi($id){
	// 	$this->db->where('id_pembayaran',$id);
	// 	$this->db->delete('tb_pembayaran');
	// 	redirect('spp');

	function pdf_laporan()
	{
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', '16');
		$ya = 44;
		$pdf->Cell(190,7,'Cetak Pembayaran SPP',0,1,'C');
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(190,7,'Data Tahun xx-xx-xxxx',0,1,'C');
	}
}
