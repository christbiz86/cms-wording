<?php

class Channel_new extends Wordingabstract{

	protected function getValue() {
		return "wording.json";
	}

	public function edit(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$id1 = $this->uri->segment(5);
		$id2 = $this->uri->segment(6);
		$file = $this->getJsonFile();
		$row = $file->$object->$id->$id1;
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'id1'		=> $id1,
			'id2'		=> $id2,
			'object'	=> $row[$id2]
		];
		return $this->load->view($object.'-edit',$data);
	}

	public function create(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$id = $_POST['id'];
		$group = $_POST['group'];
		$list[0] = ((object) $_POST);
		unset($list[0]->id);
		unset($list[0]->group);
		if(isset($file->$object->$id->$group)){
			$file->$object->$id->$group = array_merge($list,$file->$object->$id->$group);
		} else {
			$file->$object->$id->$group = $list;
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

	public function update(){
		$object = $this->uri->segment(2);
		$id_post = $_POST['id'];
		$id = $this->uri->segment(4);
		$id1 = $this->uri->segment(5);
		$id2 = $this->uri->segment(6);
		$file = $this->getJsonFile();
		$list = ((object) $_POST);
		unset($list->id);
		unset($file->$object->$id->$id1[$id2]);
		$file->$object->$id->$id1[$id2] = $list;
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

	public function delete(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$id1 = $this->uri->segment(5);
		$id2 = $this->uri->segment(6);
		$file = $this->getJsonFile();
		unset($file->$object->$id->$id1[$id2]);
		$file->$object->$id->$id1 = array_values($file->$object->$id->$id1);
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

}
