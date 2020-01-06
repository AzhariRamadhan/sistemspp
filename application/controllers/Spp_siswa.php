<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp_siswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //$this->load->model("model_skripsi");
        $this->load->library('form_validation');
        $this->model_security->getsecurity();
    }

	public function index()
	{
        if($this->session->userdata('username') == 'kepsek' || $this->session->userdata('username') == 'admin' )
        {
            show_404();
        }

		$isi['content'] 	= 'siswa/tampilan_content';
		$isi['judul']		= 'Data'; 
		$isi['sub_judul']	= 'Pembayaran SPP';
		$this->load->view('siswa/tampilan_home',$isi);
	}

	public function laporan()
	{
        if($this->session->userdata('username') == 'kepsek' || $this->session->userdata('username') == 'admin' )
        {
            show_404();
        }

		$isi['content'] 	= 'admin/tampilan_laporan';
		$isi['judul']		= 'Data'; 
		$isi['sub_judul']	= 'Pembayaran SPP';
		if($this->session->userdata('level') == 'admin'){
		$isi['data']		= $this->db->get('tb_siswa');
		$isi['data_siswa']	= $this->db->get('tb_siswa');
		$isi['data_kelas']	= $this->db->get('tb_kelas');
		}else{
		$isi['data']		= $this->db->where('nis', $this->session->userdata('nis'))->get('tb_pembayaran');
		}
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->load->model('Model_pembayaran');
		$data = array(
					'nis'				=> $this->input->post('nis'),
					'tanggal_bayar'		=> date('Y-m-d'),
			        'jumlah_bayar'		=> $this->input->post('jumlah_tagihan')
				);
		
		$this->Model_pembayaran->simpan($data);
		redirect('spp');
	}

	public function ubah()
	{
        if($this->session->userdata('username') == 'kepsek' || $this->session->userdata('username') == 'admin' )
        {
            show_404();
        }
		$this->load->model('Model_pembayaran');

		$data = array(
			'jumlah_bayar'		=> $this->input->post('jumlah_tagihan')
				);

		$this->Model_pembayaran->ubah(array('id_pembayaran' => $this->input->post('id_pembayaran')), $data);
		redirect('spp');
	}

	public function hapus($id){
        if($this->session->userdata('username') == 'kepsek' || $this->session->userdata('username') == 'admin' )
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

    public function gantiPasswordIndex()
    {
        if($this->session->userdata('username') == 'kepsek' || $this->session->userdata('username') == 'admin' )
        {
            show_404();
        }
        $this->model_security->getsecurity();
        $isi['content'] 	= 'siswa/tampil_password';
        $isi['judul']		= 'Data';
        $isi['sub_judul']	= 'Ganti Password';
        $this->load->view ('siswa/tampilan_home',$isi);
    }

    public function GantiPswd()
    {
        if($this->session->userdata('username') == 'kepsek' || $this->session->userdata('username') == 'admin' )
        {
            show_404();
        }
        $admin = $this->db->where('nis', $this->session->userdata("nis"))->get("tb_siswa")->result();
        foreach ($admin as $row) {
            if(trim($this->input->post("pswdl")) == $row->pw_siswa ){
                if(trim($this->input->post("pswdb")) == trim($this->input->post("pswdbr"))){
                    $data = array (
                        "pw_siswa" => trim($this->input->post("pswdb"))
                    );
                    $this->db->update('tb_siswa', $data, array('nis' => $this->session->userdata("nis")));

                } else {
                    $this->session->set_flashdata("info", "Masukan password baru yang sama sebanyak dua kali");
                }
            }  else {
                $this->session->set_flashdata("info", "Password baru tidak sama dengan password lama");
            }
        }

        redirect("Spp_siswa/gantiPasswordIndex");
    }
}
