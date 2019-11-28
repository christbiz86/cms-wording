<?php

class Dashboard extends CI_Controller{

	private $url = 'assets/';

	public function index(){
		$data = array(
			'title'	=> 'Dashboard',
			'menu'	=> 'dashboard',
			'submenu'=> ''
		);
		$this->load->view('dashboard',$data);
	}

	public function publish(){
		$packages = $this->Packages_model->getContent('packages.json');
		$wording = $this->Packages_model->getContent('wording.json');
		$fp = fopen($this->url."packages.txt", 'w');
		$result = fwrite($fp, $packages[0]->packages_content);
		fclose($fp);
		if ($result) {
			echo "Data Written to packages.txt file";
		} else {
			echo "Unable to write the packages.json file";
		}
		$fp1 = fopen($this->url."wording.txt", 'w');
		$result1 = fwrite($fp1, $wording[0]->packages_content);
		fclose($fp1);
		if ($result1) {
			echo "Data Written to wording.txt file";
		} else {
			echo "Unable to write the wording.txt file";
		}
	}

}
