<?php

class Dashboard extends CI_Controller{

	public function index(){
		$data = [
			'title'	=> 'Dashboard',
			'menu'	=> 'dashboard',
			'submenu'=> ''
		];
		$this->load->view('dashboard',$data);
	}

}
