<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index(){
		$data = [
			'title'	=> 'Dashboard',
			'menu'	=> 'dashboard'
		];
		return view('dashboard',$data);
	}

}
