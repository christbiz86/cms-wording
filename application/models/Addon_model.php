<?php

class Addon_model extends CI_Model {

	public function getContent(){
		return $this->db->get('addon')->result();
	}

}
