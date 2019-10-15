<?php

namespace App\Controllers;

class Channel extends Words {

	public function create(){
		$object = $this->request->uri->getSegment(2);
		$list[$_POST['id']] = array((object) $_POST);
		$file = $this->getJsonFile();
		unset($list[$_POST['id']][0]->id);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)($list));
			}
		}
		$this->updateJsonFile(json_encode($file));
//		file_put_contents('assets/wording.json',json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = $this->getJsonFile();
		unset($file->$object->$id);
		$list[$_POST['id']] = array((object) $_POST);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		unset($file->$object->$id[0]->id);
		$this->updateJsonFile(json_encode($file));
//		file_put_contents('assets/wording.json',json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

}
