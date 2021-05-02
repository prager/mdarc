<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Staff extends BaseController {
	var $username;

	public function index() {
		helper(['form', 'url']);
		//$user = $this->request->getPost('user');
		//$pass = $this->request->getPost('pass');
	  echo view('template/header');
		if($this->check_mem()) {
					$data['title'] = 'Good to Go';
					$data['msg'] = 'Good to go. You can go home ' . anchor('Home', 'here'). '<br><br>';
					//$this->mem_mod->get_members(NULL);
					echo view('status/status_view', $data);
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
