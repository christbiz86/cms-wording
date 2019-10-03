<?php
namespace App\Controllers;

class Listsubgroup extends BaseController
{

	public function create(){
		$object = $this->request->uri->getSegment(2);
		$file = json_decode(file_get_contents('assets/packages.json'));
		$list[$_POST['name']] = (object) $_POST;
		unset($list[$_POST['name']]->name);

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
		$list[$_POST['name']] = (object) $_POST;
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
