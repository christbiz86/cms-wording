<?php

namespace App\Controllers;

class Words extends WordingAbstract{

	protected function getValue() {
		return "assets/wording.json";
	}

	public function getWording(){
		$categories = array();
		$file = $this->getJsonFile();
		$object = $this->request->uri->getSegment(2);
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'object'	=> $file->$object
		];
//		unset($this->getJsonFile()->words);
//		unset($this->getJsonFile()->error_code);
//		unset($this->getJsonFile()->error);
//		unset($this->getJsonFile()->top_recommend);
//		unset($this->getJsonFile()->channel);
//		unset($this->getJsonFile()->channel_new);
//		unset($this->getJsonFile()->dlg_notif);

//		not yet done
//		unset($this->getJsonFile()->pack_promo); --> empty
//		unset($this->getJsonFile()->sms_notif);
//		var_dump($this->getJsonFile()->$object);
//		exit();
		return view($object,$data);
	}

	public function create(){
		$object = $this->request->uri->getSegment(2);
		$file = $this->getJsonFile();
		$list[$_POST['name']] = $_POST['desc'];
		foreach ($this->getJsonFile()->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($this->getJsonFile() as $key_file => $entry) {
			if($key_file == $object){
				$this->getJsonFile()->$object = ((object)$list);
			}
		}
		file_put_contents($this->getValue(),json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function edit(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = $this->getJsonFile();
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'object'	=> $this->getJsonFile()->$object->$id
		];
		return view($object.'-edit',$data);
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = $this->getJsonFile();
		unset($this->getJsonFile()->$object->$id);
		$list[$_POST['name']] = $_POST['desc'];
		foreach ($this->getJsonFile()->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($this->getJsonFile() as $key_file => $entry) {
			if($key_file == $object){
				$this->getJsonFile()->$object = ((object)$list);
			}
		}
		file_put_contents($this->getValue(),json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function delete(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = $this->getJsonFile();
		foreach ($this->getJsonFile() as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						unset($this->getJsonFile()->$object->$key_item);
					}
				}
			}
		}
		file_put_contents($this->getValue(),json_encode($this->getJsonFile()));
		return redirect()->to(site_url('/wording/'.$object));
	}

}
