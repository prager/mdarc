<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Main_con extends Controller {
	public function index(){
		//echo view('welcome_message');
		$login_mod = new \App\Models\Login_model();
		helper('form');
		echo view('template/header');
		helper('URL');
		echo view('public/main_view');
		echo view('template/footer');
	}

	public function reset_password() {
		echo view('template/header');
		$data['title'] = 'Working';
		$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Main_con', 'here'). '<br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	/*public function register() {
		echo view('template/header');
		$data['title'] = 'Working';
		$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Main_con', 'here'). '<br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}*/

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
		$data['state'] = 'CA';
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

	public function send_reg() {

		helper(['form', 'url']);
		$param = array();
    $param['fname'] = $this->request->getPost('fname');
    $param['lname'] = $this->request->getPost('lname');
    $param['email'] = $this->request->getPost('email');
    $param['street'] = $this->request->getPost('street');
    $param['city'] = $this->request->getPost('city');
    $param['state_cd'] = $this->request->getPost('state');
    $param['zip_cd'] = $this->request->getPost('zip');
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

    echo view('template/header');
		if($param['lname'] == '' || $param['fname'] == '' || $email_flag == FALSE || $param['street'] == '' || $param['city'] == '' || $param['zip_cd']
				|| $isPhoneNum == FALSE) {

						/*echo 'lname: ' . $param['lname'] . '<br>';
						echo 'fname: ' . $param['fname'] . '<br>';
						echo 'email: ' . $param['email'] . '<br>';
						echo 'street: ' . $param['street'] . '<br>';
						echo 'city: ' . $param['city'] . '<br>';
						echo 'zip_cd: ' . $param['zip_cd'] . '<br>';
						echo 'phone: ' . $param['phone'] . '<br>';*/

            $data = $param;
            $data['state'] = $param['state_cd'];
            $data['zip'] = $param['zip_cd'];
            $data['title'] = 'Error!';
            $data['msg'] = '<span style="color: red">Please, fill all the required information. Thank you!</span>';
						$data_mod = new \App\Models\Data_model();
						$data['states'] = $data_mod->get_states_array();
            echo view('public/register_view', $data);

        }
        else {
					$user_mod = new \App\Models\User_model();
          if($user_mod->register($param)) {
              $data['title'] = 'Thank you!';

							$msg_str = 'Your registration has been sent. You will get an email with further instructions within 72 hours.
                                Thank you! Click to go back to ' . anchor(base_url(), 'home page here') . '<br><br>';

							$msg_str = 'Still working on it. Check again later. Click to go back to ' . anchor(base_url(), 'home page here') . '<br><br>';

              $data['msg'] = $msg_str;
          }
          else {
              $data['title'] = 'Error!';
              $data['msg'] = '<span style="color: red">The email you provided is already in use. Please, use different email. Thank you!</span> Try again to ' .
							anchor('Main_con/register', 'register' );
          }
          echo view('status/status_view', $data);
        }
        echo view('template/footer');
	}

	public function confirm_reg() {
	    /*$verifystr = $this->uri->segment(3, 0);
	    $data['user'] = $this->User_model->get_user_to_reg($verifystr);
	    $data['msg'] = '';
	    $this->load->view('template/header_public_gen', array('logged' => FALSE));
	    $this->load->view('public/update_user_view', $data);
	    $this->load->view('template/footer_ver1');*/
			$verifystr = uri_string();
			echo 'string: ' . $verifystr;
			echo view('template/header');
			$data['title'] = 'Not Done - Conf Registrations';
			$data['msg'] = 'Still working on this. Check again later. Go to home page ' . anchor('Main_con', 'here'). '<br><br>';
			echo view('status/status_view', $data);
			echo view('template/footer');
	}
}
