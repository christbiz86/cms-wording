<?php

class Listgroup extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function index(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'message'	=> '',
			'object'	=> $file->$object,
			'file'		=> $file,
			'head'		=> $file->list_head_group_new
		];
		return $this->load->view($object,$data);
	}

	public function edit(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$detail = $this->uri->segment(5);
		$file = $this->getJsonFile();
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'detail'	=> $detail,
			'object'	=> $file->$object->$id->$detail,
			'head'		=> $file->list_head_group_new
		];
		return $this->load->view($object.'-edit',$data);
	}

	public function update(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$detail = $this->uri->segment(5);
		$file = $this->getJsonFile();
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						$file->$object->$key_item->$detail = $_POST;
					}
				}
			}
		}
		$this->updateJsonFile(json_encode($file));
		return redirect(site_url('/packages/'.$object));
	}

}
