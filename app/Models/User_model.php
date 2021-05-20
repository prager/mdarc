<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

  public function register($param) {
    $retval = True;
    $bldr = $this->db->table('users');
    $bldr->where('email', $param['email']);
    //$q = $bldr->get();
    if($bldr->countAllResults() == 0) {

      $rand_str = bin2hex(openssl_random_pseudo_bytes(12));
      $param['verifystr'] = base_url() . '/index.php/Home/confirm_reg/' . $rand_str;
	    $param['email_key'] = $rand_str;

/* Uncomment for data insert into db */
      $bldr->insert($param);

      $recipient = 'jank@jlkconsulting.info';
      $subject = 'Admin User Registration - MDARC';
      $message = $param['fname'] . ' ' . $param['lname'] . "\n\n".
 	        $param['street'] . "\n\n" .$param['city'] . ' ' . $param['state_cd'] . $param['zip_cd'] . "\n\n".
 	        ' Phone: ' . $param['phone'] . ' | Email: ' . $param['email'] . "\n\n" .
          $param['verifystr'];

 	    mail($recipient, $subject, $message);

      $recipient = $param['email'];
      $subject = 'MDARC User Registration - Admin Page by KM6NFC';

      $message = 'To finish your registration for MDARC Admin Page click on the following link or copy paste in the browser: ' . $param['verifystr'] . "\n\n";
      $message .= 'You must do so within 72 hours otherwise you login information may be deactivated.
                  Thank you for your interest in ARRL EB Section!';
	   	mail($recipient, $subject, $message);
    }
    else {
      $retval = FALSE;
    }
    return $retval;
  }

  public function get_user_to_reg($verifystr) {
    $builder = $this->db->table('users');
    $builder->where('email_key', $verifystr);
    $row = $builder->get()->getRow();
    $retarr['fname'] = $row->fname;
    $retarr['lname'] = $row->lname;
    $retarr['id_user'] = $row->id_user;
    $retarr['username'] = '';

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
//this is legacy
    $retarr['level'] = $user->type_code;
//this is current
    $retarr['type_code'] = $user->type_code;

//get the controller for the user type
    $db = \Config\Database::connect();
    $builder = $db->table('user_types');
    $builder->where('type_code', $retarr['type_code']);
    $retarr['controller'] = $builder->get()->getRow()->controller;
    $db->close();
    return $retarr;
  }

  private function get_role($id) {
    
  }

/**
* Validates user and password inspired by:
* https://stackoverflow.com/questions/11873990/create-preg-match-for-password-validation-allowing
*/
  public function validate_pass($param) {
    //preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)

    //and then also check for duplicate username
  }

}
