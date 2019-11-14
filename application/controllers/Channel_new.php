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
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'id1'		=> $id1,
			'id2'		=> $id2,
			'object'	=> $file->$object->$id->$id1[$id2]
		];
		return $this->load->view($object.'-edit',$data);
	}

	public function create(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$id = $_POST['id'];
		$list[$id][] = ((object) $_POST);
		unset($list[$id][0]->id);

		$data = array($file->$object);
		$x = 0;
		foreach($data as $data1){
			if($x == 0){
				$file->$object->$x = (object) array_merge((array)$data1->$x,$list);
			}
			$x++;
		};
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

	public function update(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$id1 = $this->uri->segment(5);
		$id2 = $this->uri->segment(6);
		$file = $this->getJsonFile();
		$list[$id2] = ((object) $_POST);
		unset($list[$id2]->id);
		unset($file->$object->$id->$id1[$id2]);
		$file->$object->$id->$id1 = $list;
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/wording/'.$object));
	}

}
