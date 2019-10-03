<?php

namespace App\Controllers;

class Packages extends BaseController
{
	public function create(){
		$object = $this->request->uri->getSegment(2);
		$file = json_decode(file_get_contents('assets/packages.json'));
		$list[$_POST['code']] = (object) $_POST;

		//insert current packages
		if($_POST['curr_packages'] == 'on'){
			$curr = $file->curr_packages;
			$curr[] = $_POST['code'];
			$file->curr_packages = $curr;
		}
		unset($list[$_POST['code']]->curr_packages);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		file_put_contents('assets/packages.json',json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

	public function update(){
		$object = $this->request->uri->getSegment(2);
		$id = $this->request->uri->getSegment(4);
		$file = json_decode(file_get_contents('assets/packages.json'));
		unset($file->$object->$id);
		$list[$_POST['code']] = (object) $_POST;

		//update current packages
		if($_POST['curr_packages'] == 'on'){
			$curr = $file->curr_packages;
			$curr[] = $_POST['code'];
			$file->curr_packages = $curr;
		} else {
			$getId = array_search($id,$file->curr_packages);
			unset($file->curr_packages[$getId]);
		}
		unset($list[$_POST['code']]->curr_packages);

		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		file_put_contents('assets/packages.json',json_encode($file));
		return redirect()->to(site_url('/wording/'.$object));
	}

}
