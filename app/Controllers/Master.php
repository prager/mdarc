<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Master extends BaseController {
	var $username;

/**
* Controller for the webmaster
*/
	public function index() {
	  echo view('template/header');
		if($this->check_master()) {
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

/**
* Checks for master user according to the type code
*/
	public function check_master() {
		$retval = FALSE;
		$user_arr = $this->login_mod->get_cur_user();
		if($user_arr['type_code'] == 99 && $user_arr['authorized'] == 1) {
			$retval = TRUE;
		}
		return $retval;
	}

	public function download_user_types() {
		if($this->check_master()) {
			$this->master_mod->put_user_types();
			return $this->response->download('files/user_types.csv', NULL);
		}
	}

	public function download_users() {
		$this->master_mod->put_users();
		return $this->response->download('files/users.csv', NULL);
	}

/**
* Enables master user edit users
*/
	public function edit_users() {
		echo view('template/header');
	 if($this->check_master()) {
			echo view('master/edit_users_view', $this->master_mod->get_users_data());
		 }
		 else {
				 $data['title'] = 'Login Error';
				 $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
				 ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
				 echo view('status/status_view', $data);
		 }
		 echo view('template/footer');
	}
}
