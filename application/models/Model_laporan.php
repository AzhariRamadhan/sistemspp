<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

    public function cariTransaksi($bulan, $tahun){
        $query = $this->db->query("SELECT tb_siswa.nis, tb_siswa.nama_siswa, tb_kelas.kode_kelas, (jumlah_bayar + jumlah_bayar_2)
 AS jumlah_bayar FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.id_siswa = tb_siswa.id_siswa INNER JOIN tb_kelas 
 ON tb_pembayaran.id_kelas = tb_kelas.id_kelas WHERE p_bulan = ".$bulan. " AND
  p_tahun = ".$tahun." ORDER BY tb_kelas.kode_kelas, tb_siswa.nis;");
        return $query->result();
    }


}
