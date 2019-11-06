<?php

class Wording extends Wordingabstract {

	protected function getValue() {
		return "wording.json";
	}

	public function getWording(){
		$categories = array();
		$file = $this->getJsonFile();
		$object = $this->uri->segment(2);
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'object'	=> $file->$object
		];
		return $this->load->view($object,$data);
	}

	public function create(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$list[$_POST['name']] = $_POST['desc'];
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

	public function edit(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'object'	=> $file->$object->$id
		];
		return $this->load->view($object.'-edit',$data);
	}

	public function update(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		unset($file->$object->$id);
		$list[$_POST['name']] = $_POST['desc'];
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

	public function delete(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						unset($file->$object->$key_item);
					}
				}
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

}
