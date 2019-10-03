<?php
namespace App\Controllers;


class Listgroup extends BaseController
{

	public function index(){
		$object = $this->request->uri->getSegment(2);
		$file = json_decode(file_get_contents('assets/packages.json'));
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'message'	=> '',
			'object'	=> $file->$object,
			'head'		=> $file->list_head_group_new
		];
		return view($object,$data);
	}

	public function edit(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$detail = $this->request->uri->getSegment(5);
		$file = json_decode(file_get_contents('assets/packages.json'));
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
		$file = json_decode(file_get_contents('assets/packages.json'));
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						$file->$object->$key_item->$detail = $_POST;
					}
				}
			}
		}
		file_put_contents('assets/packages.json',json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function create(){

	}

	public function delete(){

	}

}
