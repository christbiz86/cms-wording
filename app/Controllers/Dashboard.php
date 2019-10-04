<?php namespace App\Controllers;

use SFTP;

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
			$config['hostname'] = 'ssh.example.com';
			$config['username'] = 'root';
			$config['password'] = 'smartfren';
			$sftp = new SFTP();
			$sftp->connect($config);
			$sftp->upload('assets/packages.json', '/home/packages.json', 'ascii', 0775);
			$sftp->close();
		}
	}

}
