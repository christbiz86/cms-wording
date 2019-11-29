<?php

class Listsubgroup extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function create(){
		$file = $this->getJsonFile();
		$object = $this->uri->segment(2);
		if($object == 'partitions'){
			$list[$_POST['id']] = (object) $_POST;
			unset($list[$_POST['id']]->id);
			$this->partitions($_POST,$_POST['id']);
		} elseif($object == 'map_offer_profile'){
			$arr1 = $_POST['tagid'];
			$arr2 = $_POST['exc_tagid'];
			if(array_intersect($arr1,$arr2)){
				echo '<script language="javascript">alert("Tag and Exc Tag must be different!")</script>';
				redirect(site_url('/packages/'.$object));
			} else {
				$list[$_POST['name']] = (object) $_POST;
			}
		} else {
			$list[$_POST['name']] = (object) $_POST;
			unset($list[$_POST['name']]->name);
		}
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function update($id){
		$object = $this->uri->segment(2);
		if($object == 'partitions'){
			$list[$_POST['id']] = (object) $_POST;
			$this->partitions($_POST,$id);
		} elseif($object == 'map_offer_profile'){
			$arr1 = $_POST['tagid'];
			$arr2 = $_POST['exc_tagid'];
			if(array_intersect($arr1,$arr2)){
				echo '<script language="javascript">alert("Tag and Exc Tag must be different!")</script>';
				redirect(site_url('/packages/'.$object));
			} else {
				$list[$_POST['name']] = (object) $_POST;
			}
		} else {
			$list[$_POST['name']] = (object) $_POST;
		}
		$file = $this->getJsonFile();
		unset($file->$object->$id);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function partitions($postData,$partitions_id){
		$file = $this->getJsonFile();
		$data_currs = array();
		$data_show = array();
		$data_spc = array();
		$data_parts = array();
		foreach($file->curr_partitions as $currs1){
			$data_currs[] = $currs1;
		}
		foreach($file->showed_partitions as $show1){
			$data_show[] = $show1;
		}
		foreach($file->special_partitions as $spc1){
			$data_spc[] = $spc1;
		}
		foreach($file->data_partitions as $parts1){
			$data_parts[] = $parts1;
		}

		if($this->input->post('special_partitions')=='on'){
			if((count($data_spc) == 0) || ((array_search($partitions_id,$data_spc) == 0) && (count($data_spc) >= 0))){
				$data_spc[] = $partitions_id;
			}
		} else {
			$spc = array_search($partitions_id,$data_show);
			unset($data_spc[$spc]);
		}

		if($this->input->post('curr_partitions')=='on'){
			if((count($data_currs) == 0) || ((array_search($partitions_id,$data_currs) == 0) && (count($data_currs) >= 0))){
				$data_currs[] = $partitions_id;
			}
		} else {
			$cur_parts = array_search($partitions_id,$data_currs);
			unset($data_currs[$cur_parts]);
		}

		if($this->input->post('showed_partitions')=='on'){
			if((count($data_show) == 0) || ((array_search($partitions_id,$data_show) == 0) && (count($data_show) >= 0))){
				$data_show[] = $partitions_id;
			}
		} else {
			$show_parts = array_search($partitions_id,$data_show);
			unset($data_show[$show_parts]);
		}

		if($this->input->post('data_partitions')=='on'){
			if((count($data_parts) == 0) || ((array_search($partitions_id,$data_parts) == 0) && (count($data_parts) >= 0))){
				$data_parts[] = $partitions_id;
			}
		} else {
			$show_data_parts = array_search($partitions_id,$data_parts);
			unset($data_parts[$show_data_parts]);
		}

		$file->special_partitions = $data_spc;
		$file->curr_partitions = $data_currs;
		$file->showed_partitions = $data_show;
		$file->data_partitions = $data_parts;
		$this->updateJsonFile(json_encode($file));
	}

}
