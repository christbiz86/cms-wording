<?php

class Listgroup extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function index(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$data = array(
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'message'	=> '',
			'object'	=> $file->$object,
			'file'		=> $file,
			'head'		=> $file->list_head_group_new,
		);
		$data['addon'] = $this->Addon_model->getContent();
		return $this->load->view($object,$data);
	}

	public function create(){
		$list_name = array();
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();

		$name = $_POST['name'];
		$type = $_POST['type'];

		foreach($file->$object as $data => $value){
			$list_name[] = $data;
		}
		if(in_array($name,$list_name)){
			$list[$_POST['type']] = (object)$_POST;
			unset($list[$type]->name);
			unset($list[$type]->type);
			$file->$object->$name = (object) array_merge((array)$file->$object->$name,$list);
		} else {
			$list[$type] = (object)$_POST;
			$list1[$name] =  (object)$list;
			$file->$object = (object) array_merge((array)$file->$object,$list1);
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function edit(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$detail = $this->uri->segment(5);
		$file = $this->getJsonFile();
		$data = array(
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'detail'	=> $detail,
			'object'	=> $file->$object->$id->$detail,
			'head'		=> $file->list_head_group_new
		);
		$data['addon'] = $this->Addon_model->getContent();
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
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function delete(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$type = $this->uri->segment(5);
		$file = $this->getJsonFile();
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						unset($file->$object->$key_item->$type);
					}
				}
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

}
