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
		$count = 0;
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$id = $_POST['id'];
		$list[$id] = ((object) $_POST);
		unset($list[$id]->id);

		$data = ($file->$object);
		$x = 0;
		foreach($data as $data1){
			if($x == $id){
				foreach($data1 as $key => $value){
					if($key == $list[$id]->group){
						$count = count((array)$data1->$key);
					}
				}
			}
		};

		unset($list[$id]->group);
		$file->$object->$x->$key[$count] = $list[$id];
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

	public function update(){
		$object = $this->uri->segment(2);
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
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

}
