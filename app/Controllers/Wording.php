<?php namespace App\Controllers;

class Wording extends WordingAbstract {

	protected function getValue() {
		return "assets/packages.json";
	}

	public function getWording(){
		$categories = array();
		$object = $this->request->uri->getSegment(2);
		$file = $this->getJsonFile();
		$list = $file->list_group;
		foreach ($list as $row => $value){
			foreach ($value as $row1 => $value1){
				$categories[] = $row1;
			}
		}
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'message'	=> '',
			'object'	=> $file->$object
		];
		if($object == 'packages'){
			$data['curr_packages'] = $file->curr_packages;
			$data['duration'] = $file->list_duration;
			$data['groups'] = array_unique($categories);
			$data['subgroup'] = $file->list_sub_group;
			$data['type'] = $file->list_type;
		} elseif($object == 'partitions'){
			$data['curr_partitions'] = $file->curr_partitions;
			$data['special_partitions'] = $file->special_partitions;
			$data['showed_partitions'] = $file->showed_partitions;
			$data['data_partitions'] = $file->data_partitions;
			$data['groups'] = array_unique($categories);
			$data['type'] = $file->list_type;
			$data['subtype'] = $file->list_sub_type;
		}
//		foreach ($file->$object as $key => $value) {
//				$myDetails[$key] = $value;
//		}
//		var_dump($file->$object);
//		exit();
		return view($object,$data);
	}

	public function create(){
		$object = $this->request->uri->getSegment(2);
		$file = json_decode(file_get_contents('assets/packages.json'));
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		$list[] = (object) $_POST;
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}

		if($object == 'partitions'){
			end($file->$object);
			$partitions_id = key($file->$object);

			// update to current partitions
			if($_POST['curr_partitions'] == 'on'){
				$curr = $file->curr_partitions;
				$curr[] = $partitions_id;
				$file->curr_partitions = $curr;
			}

			// update to special partitions
			if($_POST['special_partitions'] == 'on'){
				$curr = $file->special_partitions;
				$curr[] = $partitions_id;
				$file->special_partitions = $curr;
			}

			// update to showed partitions
			if($_POST['showed_partitions'] == 'on'){
				$curr = $file->showed_partitions;
				$curr[] = $partitions_id;
				$file->showed_partitions = $curr;
			}

			// update to data partitions
			if($_POST['data_partitions'] == 'on'){
				$curr = $file->data_partitions;
				$curr[] = $partitions_id;
				$file->data_partitions = $curr;
			}
		}
		file_put_contents($this->getValue(),json_encode($file));
		return redirect()->to(site_url('/packages/'.$object));
	}

	public function delete(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = $this->getJsonFile();
		if($object == 'list_head_group_new'){
			exit();
		} elseif($object == 'packages'){
//			delete current packages if exist
			$getId = array_search($id,$file->curr_packages);
			if($getId){
				unset($file->curr_packages[$getId]);
			}
		} elseif($object == 'partitions'){
//			delete other partitions relation if exist
			$getSpcPartitions = array_search($id,$file->special_partitions);
			if($getSpcPartitions){
				unset($file->special_partitions[$getId]);
			}
			$getCurrPartitions = array_search($id,$file->curr_partitions);
			if($getCurrPartitions){
				unset($file->curr_partitions[$getId]);
			}
			$getShowPartitions = array_search($id,$file->showed_partitions);
			if($getShowPartitions){
				unset($file->showed_partitions[$getId]);
			}
			$getDataPartitions = array_search($id,$file->data_partitions);
			if($getDataPartitions){
				unset($file->data_partitions[$getId]);
			}
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						unset($file->$object->$key_item);
					}
				}
			}
		}
		file_put_contents($this->getValue(),json_encode($file));
		return redirect()->to(site_url('/packages/'.$object));
	}

	public function edit(){
		$categories = array();
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = $this->getJsonFile();
		$list = $file->list_group;
		foreach ($list as $row => $value){
			foreach ($value as $row1 => $value1){
				$categories[] = $row1;
			}
		}
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'object'	=> $file->$object->$id
		];
		if($object == 'packages'){
			$data['curr_packages'] = $file->curr_packages;
			$data['duration'] = $file->list_duration;
			$data['subgroup'] = $file->list_sub_group;
			$data['groups'] = array_unique($categories);
			$data['type'] = $file->list_type;
		} elseif($object == 'partitions'){
			$data['curr_partitions'] = $file->curr_partitions;
			$data['special_partitions'] = $file->special_partitions;
			$data['showed_partitions'] = $file->showed_partitions;
			$data['data_partitions'] = $file->data_partitions;
			$data['groups'] = array_unique($categories);
			$data['type'] = $file->list_type;
			$data['subtype'] = $file->list_sub_type;
		}
		return view($object.'-edit',$data);
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
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
			if($_POST['curr_partitions'] == 'on'){
				$curr = $file->curr_partitions;
				$curr[] = $partitions_id;
				$file->curr_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->curr_partitions);
				unset($file->curr_partitions[$getId]);
			}

			// update to special partitions
			if($_POST['special_partitions'] == 'on'){
				$curr = $file->special_partitions;
				$curr[] = $partitions_id;
				$file->special_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->special_partitions);
				unset($file->special_partitions[$getId]);
			}

			// update to showed partitions
			if($_POST['showed_partitions'] == 'on'){
				$curr = $file->showed_partitions;
				$curr[] = $partitions_id;
				$file->showed_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->showed_partitions);
				unset($file->showed_partitions[$getId]);
			}

			// update to data partitions
			if($_POST['data_partitions'] == 'on'){
				$curr = $file->data_partitions;
				$curr[] = $partitions_id;
				$file->data_partitions = $curr;
			} else {
				$getId = array_search($partitions_id,$file->data_partitions);
				unset($file->data_partitions[$getId]);
			}
		}
		file_put_contents($this->getValue(),json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

}
