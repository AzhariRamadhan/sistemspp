<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username') != 'admin')
        {
            show_404();
        }
		$this->model_security->getsecurity();
		$isi['content'] 	= 'admin/tampil_password';
		$isi['judul']		= 'Beranda';
		$isi['sub_judul']	= '';
		$this->load->view ('admin/tampilan_home',$isi);
    }
    
    public function GantiPswd()
    {
        $admin = $this->db->where('username', 'admin')->get("tb_admin")->result();
        foreach ($admin as $row) {
            if(trim($this->input->post("pswdl")) == $row->password ){
                if(trim($this->input->post("pswdb")) == trim($this->input->post("pswdbr"))){
                    $data = array (
                        "password" => trim($this->input->post("pswdb"))
                    );
                    $this->db->update('tb_admin', $data, array('username' => "admin"));

                } else {
                    $this->session->set_flashdata("info", "Masukan password baru yang sama sebanyak dua kali");
                }
            } else {
                $this->session->set_flashdata("info", "Password baru tidak sama dengan password lama");
            }
        }
        redirect("Ganti_password");
    }

}
