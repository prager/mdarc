<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Staff extends BaseController {
	var $username;

/**
* Controller for MDARC Staff
*/
	public function index() {
	  echo view('template/header');
		if($this->check_staff()) {
					echo view('staff/staff_view');
	    }
	    else {
	        $data['title'] = 'Login Error';
	        $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
	        ' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
	        echo view('status/status_view', $data);
	    }
			echo view('template/footer');
	}

	public function show_members() {
		echo view('template/header');
		if($this->check_staff()) {
			$param['states'] = $this->data_mod->get_states_array();
			$param['lic'] = $this->data_mod->get_lic();
			echo view('staff/members_view', $this->staff_mod->get_mems($param));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function add_mem() {
		echo view('template/header');
		if($this->check_staff()) {
			echo view('staff/add_mem_view', array('states' => $this->data_mod->get_states_array(), 'lic' => $this->data_mod->get_lic()));
		}
		else {
			$data['title'] = 'Login Error';
			$data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
			' to reset your password or go to home page ' . anchor('Home', 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function check_staff() {
			if($this->login_mod->is_logged())
				return TRUE;
	}

	public function download_due_emails() {
		if($this->check_staff())
			return $this->response->download('files/due-emails.txt', NULL);
	}

	public function download_cur_emails() {
		if($this->check_staff())
			return $this->response->download('files/cur-emails.txt', NULL);
	}

	public function download_address_lbls() {
		if($this->check_staff())
			return $this->response->download('files/address-lbls.txt', NULL);
	}

	public function download_all_mems() {
		if($this->check_staff())
			return $this->response->download('files/all_members.csv', NULL);
	}

	public function update_cur_yr() {
		echo view('template/header');
		$this->staff_mod->update_cur_yr();
		$data['title'] = 'Good to Go';
		$data['msg'] = 'Good to go. You can go home ' . anchor('Home', 'here'). '<br><br>';
		$data['title'] = 'OK!';
		$data['msg'] = 'Go home ' . anchor(base_url(), 'here'). '<br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function edit_mem() {
		echo view('template/header');
			if($this->check_staff()) {
				$param['cur_year'] =  trim($this->request->getPost('cur_year'));
				$param['email'] =  trim($this->request->getPost('email'));
				$param['callsign'] =  trim($this->request->getPost('callsign'));
				$param['paym_date'] = strtotime($this->request->getPost('pay_date'));
				$param['address'] = $this->request->getPost('address');
				$param['city'] = $this->request->getPost('city');
				$param['state'] = $this->request->getPost('state');
				$param['zip'] = $this->request->getPost('zip');
				$param['fname'] = $this->request->getPost('fname');
				$param['lname'] = trim($this->request->getPost('lname'));
				$param['license'] = $this->request->getPost('lic');
				$param['mem_since'] = $this->request->getPost('mem_since');
				$param['w_phone'] = $this->request->getPost('w_phone');
				$param['h_phone'] = $this->request->getPost('h_phone');
				$param['comment'] = $this->request->getPost('comment');
				$param['timestamp'] = time();
				$email = $this->request->getPost('email');

				filter_var($email, FILTER_VALIDATE_EMAIL) ? $param['email'] = $email : $param['email'] = 'none';
				$this->request->getPost('arrl') == 'TRUE' ? $param['arrl_mem'] = 'TRUE' : $param['arrl_mem'] = 'FALSE';
				$this->request->getPost('hard_news') == 'TRUE' ? $param['hard_news'] = 'TRUE' : $param['hard_news'] = 'FALSE';
				$this->request->getPost('dir') == 'TRUE' ? $param['hard_dir'] = 'TRUE' : $param['hard_dir'] = 'FALSE';
				$this->request->getPost('mem_card') == 'TRUE' ? $param['mem_card'] = 'TRUE' : $param['mem_card'] = 'FALSE';

				$this->uri->setSilent();
				$param['id'] = $this->uri->getSegment(2);

				if ($this->staff_mod->edit_mem($param)) {
					$param['states'] = $this->data_mod->get_states_array();
					$param['lic'] = $this->data_mod->get_lic();
					echo view('staff/members_view', $this->staff_mod->get_mems($param));
				}
				else {
					$data['title'] = 'Douplicate Entry Error!';
					$data['msg'] = 'This is duplicate entry. The member ' . $param['lname'] . ' with callsign ' . $param['callsign'] . ' is already in the database.<br><br>';
					$data['msg'] .= 'Go back to ' . anchor('members', 'members listing');
					echo view('status/status_view', $data);
				}
			}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function delete_mem() {
		echo view('template/header');
		if($this->check_staff()) {
			$this->uri->setSilent();
			$this->staff_mod->delete_mem($this->uri->getSegment(2));
			$param['states'] = $this->data_mod->get_states_array();
			$param['lic'] = $this->data_mod->get_lic();
			echo view('staff/members_view', $this->staff_mod->get_mems($param));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}
/**
* Temporary routine to add silent keys to the main table
*/
	public function set_silents() {
		echo view('template/header');
		$data['title'] = 'Set Silent Keys';
		$this->staff_mod->set_silents();
		$data['msg'] = 'Silent keys set -> go home ' . anchor('Home', 'here'). '<br><br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}
/**
* This will be scrapped and handled by edit_mem()
*/
	public function set_silent() {
		echo view('template/header');
		if($this->check_staff()) {
			$this->uri->setSilent();
			$param['id'] = $this->uri->getSegment(2);
			$param['silent_date'] =  time();
			$param['usr_type'] = 98;
			$param['silent_year'] = date('Y', $param['silent_date']);
			$this->staff_mod->set_silent($param);
			$param['states'] = $this->data_mod->get_states_array();
			$param['lic'] = $this->data_mod->get_lic();
			echo view('staff/members_view', $this->staff_mod->get_mems($param));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function unset_silent() {
		echo view('template/header');
		if($this->check_staff()) {
			$this->uri->setSilent();
			$this->staff_mod->unset_silent($this->uri->getSegment(2));
			$param['states'] = $this->data_mod->get_states_array();
			$param['lic'] = $this->data_mod->get_lic();
			echo view('staff/members_view', $this->staff_mod->get_mems($param));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

/**
* Generates report for MDARC Staff
*/
	public function staff_report() {
		echo view('template/header');
		if($this->check_staff()) {
//this is todo - add the data for staff reports
			$param['states'] = $this->data_mod->get_states_array();
			$param['lic'] = $this->data_mod->get_lic();
			echo view('staff/staff_report_view', $this->staff_mod->get_mems($param));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function load_silent() {
		echo view('template/header');
		if($this->check_staff()) {
				$this->uri->setSilent();
				$param['silent_date'] = strtotime($this->request->getPost('sil_date'));
				$param['silent_year'] = date('Y', $param['silent_date']);
				$param['id'] = $this->uri->getSegment(2);
				$this->staff_mod->set_silent($param);
				$param['states'] = $this->data_mod->get_states_array();
				$param['lic'] = $this->data_mod->get_lic();
				echo view('staff/members_view', $this->staff_mod->get_mems($param));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

}
