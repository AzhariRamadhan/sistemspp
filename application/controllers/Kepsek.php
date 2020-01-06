<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepsek extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != 'kepsek')
		{
			redirect("Kepseklogin");
		} else {
            $isi['content'] 	= 'kepsek/tampilan_contents';
            $isi['judul']		= 'Data';
            $isi['sub_judul']	= 'Pembayaran SPP';
                $isi['data_siswa']	= $this->db->get_where('tb_siswa', array('Verifikasi'=>'Sudah'));
                $isi['data']		= $this->db->query("SELECT * from tb_pembayaran join tb_siswa on tb_siswa.id_siswa = tb_pembayaran.id_siswa")->result();
                $isi['data_kelas']	= $this->db->get('tb_kelas');

            $this->load->view('kepsek/t_home',$isi);
        }
	}

	public function laporanIndex(){
        $isi['judul']		= 'Data';
        $isi['sub_judul']	= 'Laporan';
            $data['content']     = 'kepsek/laporan';
            $data['judul']       = 'Data';
            $data['sub_judul']   = 'Laporan';

            $this->load->view('kepsek/t_home', $data);

    }


    public function spp()
    {
        if($this->session->userdata('username') != 'kepsek')
        {
            show_404();
        }
        $isi['content'] 	= 'kepsek/tampil_spp';
        $isi['judul']		= 'Data';
        $isi['sub_judul']	= 'Pembayaran SPP';

            $isi['data_siswa']	= $this->db->get_where('tb_siswa', array('Verifikasi'=>'Sudah'));
            $isi['data']		= $this->db->query("SELECT * from tb_pembayaran join tb_siswa on tb_siswa.id_siswa = tb_pembayaran.id_siswa ")->result();
            $isi['data_kelas']	= $this->db->get('tb_kelas');
        $this->load->view('kepsek/t_home',$isi);
    }


    public function cetak(){

        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $this->load->model("Model_laporan");
        $data["seluruhSPP"] = $this->Model_laporan->cariTransaksi($bulan, $tahun);
        $data["sppBulanKe"] = $bulan;
        $data["sppTahunKe"] = $tahun;


        if($data["seluruhSPP"] != null){
            ob_start();
            $this->load->view('admin/print', $data);
            $html = ob_get_contents();
            ob_end_clean();

            require_once('./assets/html2pdf/html2pdf.class.php');
            $pdf = new HTML2PDF('P','A4','en');
            $pdf->WriteHTML($html);
            $pdf->Output('Laporan SPP '. $tahun . ' ' . $bulan . ".pdf", 'D');
        } else {
            $this->session->set_flashdata("info", "SPP di bulan dan tahun yang dimasukan tidak ditemukan");
            redirect("kepsek/laporanIndex");
        }
    }

    public function gantiPasswordIndex()
    {
        if($this->session->userdata('username') != 'kepsek')
        {
            show_404();
        }
        $this->model_security->getsecurity();
        $isi['content'] 	= 'kepsek/tampil_password';
        $isi['judul']		= 'Data';
        $isi['sub_judul']	= 'Pembayaran SPP';
        $this->load->view ('kepsek/t_home',$isi);
    }

    public function GantiPswd()
    {
        if($this->session->userdata('username') != 'kepsek')
        {
            show_404();
        }
        $admin = $this->db->where('username', 'kepsek')->get("tb_kepsek")->result();
        foreach ($admin as $row) {
            if(trim($this->input->post("pswdl")) == $row->password ){
                if(trim($this->input->post("pswdb")) == trim($this->input->post("pswdbr"))){
                    $data = array (
                        "password" => trim($this->input->post("pswdb"))
                    );
                    $this->db->update('tb_kepsek', $data, array('username' => "kepsek"));

                } else {
                    $this->session->set_flashdata("info", "Masukan password baru yang sama sebanyak dua kali");
                }
            }  else {
                $this->session->set_flashdata("info", "Password baru tidak sama dengan password lama");
            }
        }
        redirect("Kepsek/gantiPasswordIndex");
    }
}
