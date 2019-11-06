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

	public function create(){
		$object = $this->uri->segment(2);
		$list[$_POST['name']] = (object) $_POST;
		$file = $this->getJsonFile();
		$type[$_POST['type']] = ((object) $_POST);
		$list[$_POST['name']] = (object)$type;
		$list = (object)$list;
		$name = $_POST['name'];
		$type = $_POST['type'];
		unset($list->$name->$type->name);
		unset($list->$name->$type->type);
		$file->$object = (object) array_merge((array)$file->$object,(array) $list);
		$this->updateJsonFile(json_encode($file));
		return redirect(site_url('/packages/'.$object));
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

//		same name
		if($_POST['name'] == $id){
			if($_POST['type'] != $detail){
				$list[$_POST['type']] = ((object) $_POST);
				unset($list[$_POST['type']]->name);
				unset($list[$_POST['type']]->type);
				unset($file->$object->$id->$detail);
				$file->$object->$id = (object) array_merge((array)$file->$object->$id, $list );
			} else {
				foreach ($file as $key_file => $entry) {
					if($key_file == $object){
						foreach ($entry as $key_item => $item) {
							if($key_item == $id){
								$file->$object->$key_item->$detail = $_POST;
								unset($file->$object->$id->$detail['name']);
								unset($file->$object->$id->$detail['type']);
							}
						}
					}
				}
			}
//			different name
		} else {
			$type[$_POST['type']] = ((object) $_POST);
			$list[$_POST['name']] = (object)$type;
			$list = (object)$list;
			$name = $_POST['name'];
			$type = $_POST['type'];
			unset($list->$name->$type->name);
			unset($list->$name->$type->type);
			unset($file->$object->$id->$detail);
			$file->$object = (object) array_merge((array)$file->$object,(array) $list);
		}
	}

	public function delete(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						unset($file->$object->$key_item);
					}
				}
			}
		}
		$this->updateJsonFile(json_encode($file));
		return redirect(site_url('/packages/'.$object));
	}

}
