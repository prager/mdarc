<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

  public function register($param) {
    $retarr = array();
    $retarr['flag'] = TRUE;
    $db  = \Config\Database::connect();
    $bldr = $db->table('users');
//check for duplicate email
    $bldr->where('email', $param['email']);
    $cnt_email = $bldr->countAllResults();
//check for duplicate fname and lname
    $bldr->resetQuery();
    $bldr = $this->db->table('users');
    $bldr->where('fname', $param['fname']);
    $bldr->where('lname', $param['lname']);
    $cnt_name = $bldr->countAllResults();

    if(($cnt_email == 0) && ($cnt_name == 0)) {

      $rand_str = bin2hex(openssl_random_pseudo_bytes(12));
      $param['verifystr'] = base_url() . '/index.php/set-pass/' . $rand_str;
	    $param['email_key'] = $rand_str;

/* Uncomment for data insert into db */
      $bldr->insert($param);

      $recipient = 'jank@jlkconsulting.info';
      $subject = 'MDARC New User Registration';
      $message = $param['fname'] . ' ' . $param['lname'] . "\n\n".
 	        $param['street'] . "\n\n" .$param['city'] . ' ' . $param['state_cd'] . $param['zip_cd'] . "\n\n".
 	        ' Phone: ' . $param['phone'] . ' | Email: ' . $param['email'] . "\n\n" .
          $param['verifystr'];

 	    mail($recipient, $subject, $message);

      $recipient = $param['email'];
      $subject = 'MDARC Member Portal User Registration';

      $message = 'To finish your registration for MDARC Membership Portal click on the following link or copy paste in the browser: ' . $param['verifystr'] . "\n\n";
      $message .= 'You must do so within 72 hours otherwise you login information may be deactivated.
                  Thank you for your interest in Mount Diablo Amateur Radio Club!';
	   	mail($recipient, $subject, $message);
    }
    else {
      $retarr['flag'] = FALSE;
      $retarr['msg'] = 'Duplicate Entry: ';
      if($cnt_email > 0 && $cnt_name == 0) {
        $retarr['msg'] .= 'the email you entered is already in the database. Please, use a different email.';
      }
      elseif($cnt_email == 0 && $cnt_name > 0) {
        $retarr['msg'] .= 'first and last name is already in the database. Please, use the lost username and password utility.';
      }
      elseif($cnt_email > 0 && $cnt_name > 0) {
        $retarr['msg'] .= 'email including first and last name is already in the database. Please, use the lost username and password utility.';
      }
    }
    $db->close;
    return $retarr;
  }

/**
* Retrieves user data per the verify string when the user clicks the user verification URL in his/her email
* @param string $verifystr
* @return array retarr[]
*/
  public function get_user_to_reg($verifystr) {
    $db  = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->where('email_key', $verifystr);
    $row = $builder->get()->getRow();
    $retarr['fname'] = $row->fname;
    $retarr['lname'] = $row->lname;
    $retarr['id_user'] = $row->id_user;
    $retarr['username'] = '';
    $retarr['msg'] = '';
    return $retarr;
  }

/**
* Retrieve user class properties and copy into array
* @param class $user
* @return array retarr[]
*/
  public function get_user_arr($user) {
    $retarr = array();
    $retarr['id_user'] = $user->id_user;
    $retarr['fname'] = $user->fname;
    $retarr['lname'] = $user->lname;
    $retarr['email'] = $user->email;
    $retarr['phone'] = $user->phone;
    $retarr['street'] = $user->street;
    $retarr['city'] = $user->city;
    $retarr['state'] = $user->state_cd;
    $retarr['zip'] = $user->zip_cd;
    $retarr['role'] = $user->type_code;
    $retarr['username'] = $user->username;
    $retarr['authorized'] = $user->authorized;
    $retarr['active'] = $user->active;
//this is legacy
    $retarr['level'] = $user->type_code;
//this is current
    $retarr['type_code'] = $user->type_code;

//get the controller for the user type
    $db = \Config\Database::connect();
    $builder = $db->table('user_types');
    $builder->where('type_code', $retarr['type_code']);
    $retarr['controller'] = $builder->get()->getRow()->controller;
    $builder->resetQuery();

//get the position name on staff
    $builder = $db->table('staff');
    $builder->where('id_user', $user->id_user);
    if($builder->countAllResults() > 0) {
      $retarr['pos_name'] = $builder->get()->getRow()->position_name;
    }
    else {
      $retarr['pos_name'] = '';
    }
    $db->close();
    return $retarr;
  }

  /**
  * For now no use for this one
  */
  private function get_role($id) {

  }

/**
* Validates user and password inspired by:
* https://stackoverflow.com/questions/11873990/create-preg-match-for-password-validation-allowing
*/
  public function load_usr($param) {
    $retarr = array();

    $retarr['pass_match'] = TRUE;
    $retarr['pass_comp'] = TRUE;
    $retarr['flag'] = TRUE;
    $retarr['usr_dup'] = FALSE;

//check password complexity
    if($param['pass'] != $param['pass2'] && preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,12}$/', $param['pass'])) {
      $retarr['pass_comp'] = FALSE;
      $retarr['flag'] = FALSE;
    }

//check if passwords match
    if($param['pass'] != $param['pass2']) {
      $retarr['pass_match'] = FALSE;
      $retarr['flag'] = FALSE;
    }

//and then also check for duplicate username
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->where('username', $param['username']);
    if($builder->countAllResults() > 0) {
      $retarr['usr_dup'] = TRUE;
      $retarr['flag'] = FALSE;
    }

//if not flagged and all good then update username and password
    if($retarr['flag']) {
      $param['pass'] = password_hash($param['pass'], PASSWORD_BCRYPT, array('cost' => 12));
      $update = array('pass' => $param['pass'], 'username' => $param['username'], 'active' => 1);
      $builder->update($update, ['id_user' => $param['id_user']]);
    }

    return $retarr;
  }

  public function get_id_email_key($email_key) {
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->where('email_key', $email_key);
    return $builder->get()->getRow()->id_user;
  }

}
