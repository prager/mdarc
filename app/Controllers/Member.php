<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Staff extends BaseController {

/**
* Controller for the rank and file members
*/
	public function index() {
		helper(['form', 'url']);
	  echo view('template/header');
		if($this->check_mem()) {
					echo view('status/member_view');
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
