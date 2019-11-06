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
		$file = $this->getJsonFile();
		unset($file->$object->$id);
		if($object == 'partitions'){
			$list[$_POST['id']] = (object) $_POST;
		} else {
			$list[$_POST['name']] = (object) $_POST;
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

}
