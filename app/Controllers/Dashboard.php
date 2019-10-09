<?php namespace App\Controllers;

use Net_SSH2;

class Dashboard extends BaseController
{
	public function index(){
		$data = [
			'title'	=> 'Dashboard',
			'menu'	=> 'dashboard'
		];
		return view('dashboard',$data);
	}

	public function publish(){
		$data = [
			'title'	=> 'Publish to Server',
			'menu'	=> 'publish',
			'message'	=> ''
		];
		return view('publish',$data);
	}

	public function runPublish(){
		if($_POST['name'] != 'publish'){
			$data = [
				'title'	=> 'Publish to Server',
				'menu'	=> 'publish',
				'message'	=> 'error'
			];
			return view('publish',$data);
		} else {
//			$file = $this->request->getFile('inputFile')->store('test_upload/', 'user_name.json');
//			var_dump($file);



		}
	}

}
