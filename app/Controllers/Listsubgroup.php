<?php
namespace App\Controllers;

class Listsubgroup extends Wording{

	public function create(){
		$object = $this->request->uri->getSegment(2);
		$file = $this->getJsonFile();
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
		file_put_contents($this->getValue(),json_encode($file));
		return redirect()->to(site_url('/packages/'.$object));
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
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
		file_put_contents($this->getValue(),json_encode($file));
		return redirect()->to(site_url('/packages/'.$object));
	}

}
