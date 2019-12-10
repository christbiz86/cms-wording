<?php

class Packages extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function getWording($object){
		$categories = array();
		$file = $this->getJsonFile();
		$list = $file->list_group;
		foreach ($list as $row => $value){
			foreach ($value as $row1 => $value1){
				$categories[] = $row1;
			}
		}
		$data = array(
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'message'	=> '',
			'object'	=> $file->$object,
			'file'		=> $file
		);
		if($object == 'packages'){
			$data['curr_packages'] = $file->curr_packages;
			$data['duration'] = $file->list_duration;
			$data['groups'] = array_unique($categories);
			$data['subgroup'] = $file->list_sub_group;
			$data['addon'] = $this->Addon_model->getContent();
//			$data['type'] = $file->list_type;
		} elseif($object == 'partitions'){
			$data['curr_partitions'] = $file->curr_partitions;
			$data['special_partitions'] = $file->special_partitions;
			$data['showed_partitions'] = $file->showed_partitions;
			$data['data_partitions'] = $file->data_partitions;
			$data['groups'] = array_unique($categories);
//			$data['type'] = $file->list_type;
//			$data['subtype'] = $file->list_sub_type;
		}
//		foreach ($file->$object as $key => $value) {
//				$myDetails[$key] = $value;
//		}
//		var_dump($file->$object);
//		exit();
		return $this->load->view($object,$data);
	}

	public function edit($object){
		$categories = array();
		$id = urldecode($this->uri->segment(4));
		$file = $this->getJsonFile();
		$list = $file->list_group;
		foreach ($list as $row => $value){
			foreach ($value as $row1 => $value1){
				$categories[] = $row1;
			}
		}
		$data = array(
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'file'		=> $file,
			'object'	=> $file->$object->$id
		);
		if($object == 'packages'){
			$data['curr_packages'] = $file->curr_packages;
			$data['duration'] = $file->list_duration;
			$data['subgroup'] = $file->list_sub_group;
			$data['groups'] = array_unique($categories);
			$data['addon'] = $this->Addon_model->getContent();
			$data['special_partitions'] = $file->partitions;
//			$data['type'] = $file->list_type;
		} elseif($object == 'partitions'){
			$data['curr_partitions'] = $file->curr_partitions;
			$data['special_partitions'] = $file->special_partitions;
			$data['showed_partitions'] = $file->showed_partitions;
			$data['data_partitions'] = $file->data_partitions;
			$data['groups'] = array_unique($categories);
//			$data['type'] = $file->list_type;
//			$data['subtype'] = $file->list_sub_type;
		}
		return $this->load->view($object.'-edit',$data);
	}

	public function update($object){
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						$file->$object->$key_item = $_POST;
					}
				}
			}
		}

		if($object == 'partitions'){
			end($file->$object);
			$partitions_id = key($file->$object);

			// update to current partitions
			if($this->input->post('curr_partitions') == 'on'){
				$curr = $file->curr_partitions;
				$curr[] = $partitions_id;
				$file->curr_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->curr_partitions);
				unset($file->curr_partitions[$getId]);
			}

			// update to special partitions
			if($this->input->post('special_partitions') == 'on'){
				$curr = $file->special_partitions;
				$curr[] = $partitions_id;
				$file->special_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->special_partitions);
				unset($file->special_partitions[$getId]);
			}

			// update to showed partitions
			if($this->input->post('showed_partitions') == 'on'){
				$curr = $file->showed_partitions;
				$curr[] = $partitions_id;
				$file->showed_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->showed_partitions);
				unset($file->showed_partitions[$getId]);
			}

			// update to data partitions
			if($this->input->post('data_partitions') == 'on'){
				$curr = $file->data_partitions;
				$curr[] = $partitions_id;
				$file->data_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->data_partitions);
				unset($file->data_partitions[$getId]);
			}
		}

		$this->Packages_model->updateJsonFile($this->getValue(),json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function delete($object){
		$getId = $this->uri->segment(4);
		$file = $this->getJsonFile();
		if($object == 'list_head_group_new'){
			unset($file->$object->$getId);
		} elseif($object == 'packages'){
//			delete current packages if exist
			foreach($file->curr_packages as $row => $value){
				if($value == $id){
					unset($file->curr_packages[$row]);
				}
			}
		} elseif($object == 'partitions'){
//			delete other partitions relation if exist
			$getSpcPartitions = array_search($getId,$file->special_partitions);
			if($getSpcPartitions){
				unset($file->special_partitions[$getSpcPartitions]);
			}
			$getCurrPartitions = array_search($getId,$file->curr_partitions);
			if($getCurrPartitions){
				unset($file->curr_partitions[$getCurrPartitions]);
			}
			$getShowPartitions = array_search($getId,$file->showed_partitions);
			if($getShowPartitions){
				unset($file->showed_partitions[$getShowPartitions]);
			}
			$getDataPartitions = array_search($getId,$file->data_partitions);
			if($getDataPartitions){
				unset($file->data_partitions[$getDataPartitions]);
			}
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $getId){
						unset($file->$object->$key_item);
					}
				}
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function create(){
		$object = $this->uri->segment(2);
		$list[$_POST['name']] = (object) $_POST;
		$file = $this->getJsonFile();
		unset($list[$_POST['name']]->name);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)($list));
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

}
