<?php
namespace App\Controllers;

class Listduration extends Wording{

	public function create(){
		$object = $this->request->uri->getSegment(2);
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
		return redirect()->to(site_url('/packages/'.$object));
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
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
		return redirect()->to(site_url('/packages/'.$object));
	}

}
