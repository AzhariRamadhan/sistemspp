<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('model_laporan');
  }
  
  public function index(){
    $data['content']     = 'admin/laporan';
    $data['judul']       = 'Data';
    $data['sub_judul']   = 'Laporan';

    $this->load->view('admin/tampilan_home', $data);
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
        redirect("laporan");
      }
  }
}