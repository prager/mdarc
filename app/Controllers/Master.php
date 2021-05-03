<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Master extends BaseController {
	var $username;

/**
* Controller for the rank and file members
*/
	public function index() {
		helper(['form', 'url']);
		//$user = $this->request->getPost('user');
		//$pass = $this->request->getPost('pass');
	  echo view('template/header');
		if($this->check_mem()) {
					echo view('master/master_view');
	    }
	    else {
	        $data['title'] = 'Login Error';
	        $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
	        ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
	        echo view('status/status_view', $data);
	    }
			echo view('template/footer');
	}

	public function check_mem() {
		if($this->login_mod->is_logged())
			return TRUE;
	}
}
