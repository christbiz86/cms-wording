<?php

class Listduration extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
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
		return redirect(site_url('/packages/'.$object));
	}

	public function update($id){
		$object = $this->uri->segment(2);
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
		return redirect(site_url('/packages/'.$object));
	}

}
