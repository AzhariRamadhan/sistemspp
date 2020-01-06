<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswabaru extends CI_model {

    public function Simpan($data)
    {
        $this->db->insert('tb_kelas', $data);
        return $this->db->insert_id();
    }

    public function Ubah($where, $data)
    {
        $this->db->update('tb_kelas', $data, $where);
        return $this->db->affected_rows();
    }

    public function Hapus($id)
    {
        $this->db->where('nis', $id);
        $this->db->delete('tb_siswa');
    }

    public function Getlogin()
    {
        
    }

    public function Getlogin1()
    {
        # code...
    }

    public function Getlogin2()
    {
        # code...
    }
}