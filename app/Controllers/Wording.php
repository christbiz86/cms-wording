<?php namespace App\Controllers;

class Wording extends BaseController{

	public function getWording(){
		$object = $this->request->uri->getSegment(2);
		$file = json_decode(file_get_contents('assets/packages.json'));
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'message'	=> '',
			'object'	=> $file->$object
		];
		if($object == 'packages'){
			$data['curr_packages'] = $file->curr_packages;
		} elseif($object == 'partitions'){
			$data['curr_partitions'] = $file->curr_partitions;
			$data['special_partitions'] = $file->special_partitions;
			$data['showed_partitions'] = $file->showed_partitions;
			$data['data_partitions'] = $file->data_partitions;
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
		file_put_contents('assets/packages.json',json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function delete(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = json_decode(file_get_contents('assets/packages.json'));
		if($object == 'list_head_group_new'){
			exit();
		} elseif($object == 'packages'){
//			delete current packages if exist
			$getId = array_search($id,$file->curr_packages);
			if($getId){
				unset($file->curr_packages[$getId]);
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
		file_put_contents('assets/packages.json',json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function edit(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = json_decode(file_get_contents('assets/packages.json'));
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'id'		=> $id,
			'object'	=> $file->$object->$id
		];
		if($object == 'packages'){
			$data['curr_packages'] = $file->curr_packages;
		} elseif($object == 'partitions'){
			$data['curr_partitions'] = $file->curr_partitions;
			$data['special_partitions'] = $file->special_partitions;
			$data['showed_partitions'] = $file->showed_partitions;
			$data['data_partitions'] = $file->data_partitions;
		}
		return view($object.'-edit',$data);
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = json_decode(file_get_contents('assets/packages.json'));
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				foreach ($entry as $key_item => $item) {
					if($key_item == $id){
						$file->$object->$key_item = $_POST;
					}
				}
			}
		}
		file_put_contents('assets/packages.json',json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

}
