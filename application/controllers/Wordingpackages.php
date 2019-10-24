<?php

class Wordingpackages extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function create(){
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
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
		$this->updateJsonFile(json_encode($file));
		return redirect(site_url('/packages/'.$object));
	}

	public function update(){
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
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
		$this->updateJsonFile(json_encode($file));
		return redirect(site_url('/packages/'.$object));
	}

}