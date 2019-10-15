<?php
namespace App\Controllers;

class Listgroup extends Wording{

	public function index(){
		$object = $this->request->uri->getSegment(2);
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
		return view($object,$data);
	}

	public function edit(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$detail = $this->request->uri->getSegment(5);
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
		return view($object.'-edit',$data);
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$detail = $this->request->uri->getSegment(5);
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
		return redirect()->to(site_url('/packages/'.$object));
	}

}
