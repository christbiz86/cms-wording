<?php

namespace App\Controllers;

class Channel extends Words {

	public function create(){
		$object = $this->request->uri->getSegment(2);
		$list[$_POST['id']] = array((object) $_POST);
		unset($list[$_POST['id']][0]->id);
		foreach ($this->getJsonFile()->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($this->getJsonFile() as $key_file => $entry) {
			if($key_file == $object){
				$this->getJsonFile()->$object = ((object)($list));
			}
		}
		file_put_contents('assets/wording.json',json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		unset($this->getJsonFile()->$object->$id);
		$list[$_POST['id']] = array((object) $_POST);
		foreach ($this->getJsonFile()->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($this->getJsonFile() as $key_file => $entry) {
			if($key_file == $object){
				$this->getJsonFile()->$object = ((object)$list);
			}
		}
		file_put_contents('assets/wording.json',json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

}
