<?php

class Wordingpackages extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function create(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$list[$_POST['code']] = (object) $_POST;

		//insert current packages
		if($_POST['curr_packages'] == 'on'){
			$curr = $file->curr_packages;
			$curr[] = $_POST['id'];
			$file->curr_packages = $curr;
		}
		unset($list[$_POST['id']]->curr_packages);
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

	public function update(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		unset($file->$object->$id);
		$list[$_POST['code']] = (object) $_POST;

		//update current packages
		if(isset($_POST['curr_packages'])){
			$data_curr = array();
			$curr = $file->curr_packages;
			foreach($curr as $curr_key => $curr_value){
				$data_curr[$curr_key] = $curr_value;
			}
			$data_curr[] = $_POST['id'];
			$file->curr_packages = (object)$data_curr;
		} else {
			foreach($file->curr_packages as $key_curr => $currs){
				if($currs == $id){
					unset($file->curr_packages->$key_curr);
				}
			}
		}
		unset($list[$_POST['id']]->curr_packages);

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

	public function view(){
		$categories = array();
		$file = $this->getJsonFile();
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'object'	=> $file->$object->$id,
			'file'		=> $file,
			'id'		=> $id,
			'curr_packages'	=> $file->curr_packages
		];
		return $this->load->view($object.'-view',$data);
	}

}
