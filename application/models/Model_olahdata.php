<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_olahdata extends CI_Model {
	


	public function namamhs(){
		return $this->db->get("tb_member");
	}


}	