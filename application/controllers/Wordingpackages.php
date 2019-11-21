<?php

class Wordingpackages extends Wordingabstract {

	protected function getValue() {
		return "packages.json";
	}

	public function create(){
		$special_partitions = array();
		$object = $this->uri->segment(2);
		$file = $this->getJsonFile();
		$list[$_POST['code']] = (object) $_POST;

		$fake_partition_id = $_POST['fakeid'];
		$fake_partition_amount = $_POST['fakeamount'];
		foreach($fake_partition_id as $fake => $fake_value){
			if(!empty($fake_value)) {
				$special_partitions[$fake] = array($fake_partition_id[$fake]);
				$special_partitions[$fake][] = $fake_partition_amount[$fake];
			}
		}

		//insert current packages
		if(isset($_POST['curr_packages'])) {
			$data_curr = array();
			$curr = $file->curr_packages;
			foreach ($curr as $curr_key => $curr_value) {
				$data_curr[$curr_key] = $curr_value;
			}
			$data_curr[] = $_POST['id'];
			$file->curr_packages = $data_curr;
		}
		$list[$_POST['id']]->special_partitions = $special_partitions;
		unset($list[$_POST['id']]->curr_packages);
		unset($list[$_POST['id']]->fakeid);
		unset($list[$_POST['id']]->fakeamount);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}
		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function update(){
		$special_partitions = array();
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$file = $this->getJsonFile();
		unset($file->$object->$id);
		$list[$_POST['code']] = (object) $_POST;

		$fake_partition_id = $_POST['fakeid'];
		$fake_partition_amount = $_POST['fakeamount'];
		foreach($fake_partition_id as $fake => $fake_value){
			if(!empty($fake_value)) {
				$special_partitions[$fake] = array($fake_partition_id[$fake]);
				$special_partitions[$fake][] = $fake_partition_amount[$fake];
			}
		}
		//update current packages
		if(isset($_POST['curr_packages'])){
			$data_curr = array();
			$curr = $file->curr_packages;
			foreach($curr as $curr_key => $curr_value){
				$data_curr[$curr_key] = $curr_value;
			}
			$getId = array_search($_POST['id'],$data_curr);
			if(!$getId){
				$data_curr = array_merge($data_curr,array($_POST['id']));
			}
			$file->curr_packages = $data_curr;
		} else {
			foreach($file->curr_packages as $key_curr => $currs){
				if($currs == $id){
					unset($file->curr_packages[$key_curr]);
				}
			}
		}
		$list[$_POST['id']]->special_partitions = $special_partitions;
		unset($list[$_POST['id']]->curr_packages);
		unset($list[$_POST['id']]->fakeid);
		unset($list[$_POST['id']]->fakeamount);
		foreach ($file->$object as $key => $value) {
			$list[$key] = $value;
		}

		foreach ($file as $key_file => $entry) {
			if($key_file == $object){
				$file->$object = ((object)$list);
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

	public function view(){
		$categories = array();
		$file = $this->getJsonFile();
		$object = $this->uri->segment(2);
		$id = $this->uri->segment(4);
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object,
			'object'	=> $file->$object->$id,
			'file'		=> $file,
			'id'		=> $id,
			'curr_packages'	=> $file->curr_packages
		];
		return $this->load->view($object.'-view',$data);
	}

	public function unitdetail($id){
		$file = $this->getJsonFile();
		$object = 'packages';
		$var = get_object_vars($file->$object);
		$data = [
			'title'		=> 'Wording List',
			'menu'		=> 'wording',
			'submenu'	=> $object
		];
		if($id=='add'){
			return $this->load->view('unitdetail-add',$data);
		} else {
			if(isset($var[$id]->units)){
				$data['object'] = $var[$id]->units;
				$data['id'] = $id;
			} else {
				$data['object'] = '';
			}
			return $this->load->view('unitdetail-view',$data);
		}
	}

	public function unitdetailupdate($id){
		$list = array();
		$res = array();
		$unit_lang = array();
		$x = 0;
		$file = $this->getJsonFile();
		$object = 'packages';
		$var = get_object_vars($file->$object);
		$jml = count($_POST['type']);
		for($a=0;$a<$jml;$a++){
			$unit_lang[$a][] = $_POST['unit_ind'][$a];
			$unit_lang[$a][] = $_POST['unit_eng'][$a];
			$list[$x]['type'] = $_POST['type'][$a];
			$list[$x]['val'] = $_POST['val'][$a];
			$list[$x]['default'] = $_POST['default'][$a];
			$list[$x]['unit'] = $unit_lang[$a];
			$x++;
		}
		$res['total'] = (int)$_POST['total'];
		$res['item'] = json_decode(json_encode($list), FALSE);
		foreach($file->packages as $key => $value){
			if($key == $id){
				unset($file->packages->$key->units);
				$file->packages->$key->units = (object)$res;
			}
		}
		$this->updateJsonFile(json_encode($file));
		redirect(site_url('/packages/'.$object));
	}

}
