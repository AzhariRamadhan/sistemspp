<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembayaran extends CI_Model {

	public function bolehDataPembayaranDitambahkan($id_siswa, $tahun, $bulan, $id_pembayaran){

		$dataPembayaran = $this->db->where("id_pembayaran", $id_pembayaran)->get("tb_pembayaran")->result();

		if(count($dataPembayaran) > 0 || $id_pembayaran === "cek")  {

			if ($dataPembayaran[0]->id_siswa !== $id_siswa || $dataPembayaran[0]->p_tahun !== $tahun || $dataPembayaran[0]->p_bulan !== $bulan) {

				$dataPembayaran = $this->db->where("id_siswa", $id_siswa)->where("p_tahun", $tahun)->where("p_bulan", $bulan)->
				get("tb_pembayaran");

				if ($dataPembayaran->num_rows() > 0) {
					return false;

				} else {
					return true;
				}

			} else {
				return true;
			}

		} else {
			return true;
		}
	}


    public function cekApakahJmlPembayaranBerlebih($jumlah){
    /*    $total = 0;
        $jumlahPembayaranBulanIni = $this->db->where("id_siswa", $id_siswa)->where("p_tahun", $tahun)->where("p_bulan", $bulan)->
            get("tb_pembayaran");
        if($jumlahPembayaranBulanIni->num_rows() > 0){
            foreach ($jumlahPembayaranBulanIni->result() as $pembayaran) {
                $total += $pembayaran->jumlah_bayar +$pembayaran->jumlah_bayar_2;

            }

        }
		$total += $jumlah;

        if($id !== "" && $id !==null) {
            $jumlahDikurangi = $this->db->where("id_pembayaran", $id)->get("tb_pembayaran")->result();
            foreach ($jumlahDikurangi as $jumlahBaru){
            	if($jumlahBaru->id_siswa === $id_siswa)
                $total -= $jumlahBaru->jumlah_bayar;

            }
        }

        if($total > 145000 || $total < 0){
            return false;
        } else {
			return true;
		}

     */

		if($jumlah > 145000 || $jumlah < 0){
			return false;
		} else {
			return true;
		}

    }

	public function simpan($data){
		$this->db->insert('tb_pembayaran', $data);
		return $this->db->insert_id();
	}

	public function ubah($where, $data){
	    $this->db->update('tb_pembayaran', $data, $where);
		return $this->db->affected_rows();
	}

	public function hapus($id){
		$this->db->where('id_siswa',$id);
		$this->db->delete('tb_pembayaran');
	}
}
