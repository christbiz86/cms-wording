<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index(){
		return view('login');
	}

	public function submit(){
		public function authenticate($username, $password) {
			//return true;

			$server = "10.0.0.122";   // jkt-dc02
			$username = 'wireless\\'.$username;

			$ds = @ldap_connect($server);  // assuming the LDAP server is on this host

			if ($ds) {
				// bind with appropriate dn to give update access
				$connect = @ldap_bind($ds, $username, $password);
				if(!$connect) {
					@ldap_close($ds);
					return false;
				} else {
					@ldap_close($ds);
					return true;
				}
				@ldap_close($ds);
			} else {
				return false;
				@ldap_close($ds);
			}
		}
//		redirect('dashboard');
	}

}
