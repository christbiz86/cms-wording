<?php

class Packages_model extends CI_Model {

	public function getContent($title){
		return $this->db->where('packages_title',$title)->get('packages')->result();
	}

	public function updateJsonFile($title,$content){
		$data = array(
			'packages_content' => $content
		);
		$this->db->where('packages_title',$title)->update('packages',$data);
	}

}
