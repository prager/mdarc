<?php namespace App\Controllers;

use CodeIgniter\Controller;

/**
* This is the default controller
*/
class Home extends BaseController {
	public function index() {
		//echo view('welcome_message');
		echo view('template/header');
		if(!($this->login_mod->is_logged())) {
			echo view('public/main_view');
		}
		else {
			//return redirect()->to(base_url(). '/' . 'index.php/' . $this->login_mod->get_cur_user()['controller']);
			return redirect()->route($this->login_mod->get_cur_user()['controller']);
		}
		echo view('template/footer');
	}

	public function reset_password() {
		echo view('template/header');
		$data['title'] = 'Working';
		$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Home', 'here'). '<br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function register() {
		$data = array();
		helper(['form', 'url']);
		$data_mod = new \App\Models\Data_model();
		echo view('template/header');
		$data['fname'] = '';
		$data['lname'] = '';
		$data['email'] = '';
		$data['callsign'] = '';
		$data['phone'] = '';
		$data['street'] = '';
		$data['city'] = '';
		$data['state_cd'] = 'CA';
		$data['zip_cd'] = '';
		$data['msg'] = '';
		$data['twitter'] = '';
		$data['facebook'] = '';
		$data['linkedin'] = '';
		$data['googleplus'] = '';
		$data['states'] = $data_mod->get_states_array();
		echo view('public/register_view', $data);
		echo view('template/footer');
	}

/**
* The first step of user registration when the user sends the initial data. The second step will include setting the username and password
* via the confirm_reg() below
*/
	public function send_reg() {

		helper(['form', 'url']);
		$param = array();
    $param['fname'] = $this->request->getPost('fname');
    $param['lname'] = $this->request->getPost('lname');
    $param['email'] = $this->request->getPost('email');
    $param['street'] = $this->request->getPost('street');
    $param['city'] = $this->request->getPost('city');
    $param['state_cd'] = $this->request->getPost('state_cd');
    $param['zip_cd'] = $this->request->getPost('zip_cd');
    $param['phone'] = $this->request->getPost('phone');
    $param['callsign'] = $this->request->getPost('callsign');
    $param['facebook'] = $this->request->getPost('facebook');
    $param['twitter'] = $this->request->getPost('twitter');
    $param['linkedin'] = $this->request->getPost('linkedin');


		$email_flag = TRUE;
		if (!filter_var($param['email'], FILTER_VALIDATE_EMAIL)) {
  		$email_flag = FALSE;
			//echo 'email flag!<br>';
		}

		$isPhoneNum = FALSE;
		//eliminate every char except 0-9
		$justNums = preg_replace("/[^0-9]/", '', $param['phone']);

		//eliminate leading 1 if its there
		if (strlen($justNums) == 11) $justNums = preg_replace("/^1/", '',$justNums);

		//if we have 10 digits left, it's probably valid.
		if (strlen($justNums) == 10) $isPhoneNum = TRUE;

		$param['ip'] = $this->get_ip();

		//echo 'ip: ' . $param['ip'];
		echo view('template/header');
		if($param['lname'] == '' || $param['fname'] == '' || $email_flag == FALSE || $param['street'] == '' || $param['city'] == '' || $param['zip_cd'] == ''
				|| $isPhoneNum == FALSE || $param['fname'] == $param['lname']) {
            $data = $param;
            $data['state_cd'] = $param['state_cd'];
            $data['zip_cd'] = $param['zip_cd'];
            $data['title'] = 'Error!';
            $data['msg'] = '<span style="color: red">Please, fill all the required information marked by *. Thank you!</span>';
						$data['states'] = $this->data_mod->get_states_array();
            echo view('public/register_view', $data);

        }
        else {
					$retarr = $this->user_mod->register($param);
          if($retarr['flag']) {

              $data['title'] = 'Thank you!';

							$msg_str = 'Your registration has been sent. You will get an email with further instructions within 72 hours. Please, also check your spam messages since
													this email can be wrongly flagged as spam by your email server. Thank you! Click to go back to ' . anchor(base_url(), 'home page here') . '<br><br>';

							//$msg_str = 'Still working on it. Check again later. Click to go back to ' . anchor(base_url(), 'home page here') . '<br><br>';

              $data['msg'] = $msg_str;
          }
          else {
              $data['title'] = 'Error!';
              $data['msg'] = '<span style="color: red">' . $retarr['msg'] . '</span> Try again to ' .
							anchor('Home/register', 'register' );
          }
          echo view('status/status_view', $data);
        }
        echo view('template/footer');
	}

/**
* This is called by clicking on the emailed URL to confirm registration by setting up username and password
*/
	public function set_pass() {
			$this->uri->setSilent();
			$verifystr = $this->uri->getSegment(2);
	    echo view('template/header');
//commented out until finished
	    //echo view('public/set_pass_view', $this->user_mod->get_user_to_reg($verifystr));
			//$param['verstr'] = $this->uri->getSegment(2);
			//echo 'verstr: ' . $param['verstr'];
			$data['id_user'] = $this->user_mod->get_usr_verstr(trim($this->uri->getSegment(2)));

			/*$data['title'] = 'Not Done - Conf Registrations';
			$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Home', 'here'). '<br><br>';
			echo view('status/status_view', $data);*/

			$data['msg'] = '';

			echo view('public/set_pass_view', $data);

	    echo view('template/footer');

/* Below is legacy stuff */

			//$verifystr = uri_string();
			/*$this->uri->setSilent();
			$verifystr = $this->uri->getSegment(3);
			echo 'string: ' . $verifystr;
			echo view('template/header');

			$data['title'] = 'Not Done - Conf Registrations';
			$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Home', 'here'). '<br><br>';
			echo view('status/status_view', $data);*/
			//echo view('template/public/update_user_view', $this->user_mod->get_user_to_reg($this->uri->getSegment(3)););
			//echo view('template/footer');

/* --- End of legacy stuff */
	}

/**
* This is the final step for the user when will send his username and password.
* When these are saved the master user will approve him and only then the user will gain
* appropriate access according his user profile
*/
	public function load_usr() {
		echo view('template/header');
		$data['title'] = 'Not Done - Load User step';
		$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Home', 'here'). '<br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

/**
* Leftover from legacy app (?)
*/
	public function set_user_login() {
		$param['id_user'] = $this->uri->getSegment(3);
	}

/**
* Self-explanatory: calls the logout function from Loging_model
*/
	public function logout() {
		$this->login_mod->logout();
		echo view('template/header', array('logged' => FALSE));
		echo view('public/main_view');
		echo view('template/footer');
	}
/**
* Inspired by: https://www.w3resource.com/php-exercises/php-basic-exercise-5.php
*/
	private function get_ip() {
		$ip_address = NULL;
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	$ip_address = $_SERVER['HTTP_CLIENT_IP'];
  	}
	//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		  $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	//whether ip is from remote address
		else {
		  $ip_address = $_SERVER['REMOTE_ADDR'];
		}
		return $ip_address;
	}

}
