<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController {
	var $username;

	public function index() {
		helper(['form', 'url']);
		if($this->validate_credentials()) {
					return redirect()->to(base_url(). '/' . 'index.php/' . $this->login_mod->get_cur_user()['controller']);
	    }
	    else {
	        echo view('template/header');
	        $data['title'] = 'Login Error';
	        $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
	        ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
	        echo view('status/status_view', $data);
	        echo view('template/footer');
	    }
	}

	public function load_user() {
	    echo view('template/header');
			$login_mod = new \App\Models\Login_model();
	    $flag = $login_mod->check_table($login_mod->get_cur_user_id());

	    $data['user'] = $login_mod->get_cur_user($login_mod->get_cur_user_id());

	    echo view('admin/admin_view', $data);
	    echo view('template/footer');
	}

	public function validate_credentials() {
	    $this->username = strtolower($this->request->getPost('user'));
	    $password = $this->request->getPost('pass');
	    $data['user'] = $this->username;
	    $data['pass'] = $password;
			return $this->login_mod->check_credentials($data);
	}

}
