<?php namespace App\Models;

use CodeIgniter\Model;

class Member_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
  }

/**
* Collect all the members data to be displayed on the portal and for file downloads
*/
  public function get_mems($param) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $db->close();
    $res = $builder->get()->getResult();

//members current on their dues
    $cur_members = array();
    $cur_emails = array();

//members who want hardcopy of The Carrier and string for the address labels
    $carrier = array();
    $lbl_str = "";

//array of members owing dues
    $pay_due = array();

//email string and array of emails for the member owing dues
    $due_emails = '';
    $due_emails_arr = array();

//lists everybody in MDARC
    $all_members = array();

//array for deleted members
    $del_members = array();
    $silent_keys = array();

//The monster loop harvesting all the members data
    foreach($res as $member) {
      $elem = array();
      $elem['id'] = $member->id_members;
      $elem['carrier'] = filter_var(trim(strtoupper($member->hard_news)), FILTER_VALIDATE_BOOLEAN);
      $elem['dir'] = filter_var(trim(strtoupper($member->hard_dir)), FILTER_VALIDATE_BOOLEAN);
      $elem['arrl'] = filter_var(trim(strtoupper($member->arrl_mem)), FILTER_VALIDATE_BOOLEAN);
      $elem['mem_card'] = filter_var(trim(strtoupper($member->mem_card)), FILTER_VALIDATE_BOOLEAN);
      $member->h_phone == NULL ? $elem['h_phone'] = '000-000-0000' : $elem['h_phone'] = $member->h_phone;
      $member->w_phone == NULL ? $elem['w_phone'] = '000-000-0000' : $elem['w_phone'] = $member->w_phone;
      $member->comment == NULL ? $elem['comment'] = '' : $elem['comment'] = $member->comment;
      $elem['fname'] = $member->fname;
      $elem['lname'] = $member->lname;
      $member->address == NULL ? $elem['address'] = 'N/A' : $elem['address'] = $member->address;
      $member->city == NULL ? $elem['city'] = 'N/A' : $elem['city'] = $member->city;
      $member->state == NULL ? $elem['state'] = 'N/A' : $elem['state'] = $member->state;
      $member->zip == NULL ? $elem['zip'] = 'N/A' : $elem['zip'] = $member->zip;
      $elem['active'] = $member->active;
      $member->cur_year == NULL ? $elem['cur_year'] = 'N/A' : $elem['cur_year'] = $member->cur_year;
      $elem['mem_type'] = $member->mem_type;
      $elem['callsign'] = $member->callsign;
      $elem['license'] = $member->license;
      $elem['hard_news'] = $member->hard_news;
      $elem['pay_date'] = date('Y-m-d', $member->paym_date);
      $member->mem_since == NULL ? $elem['mem_since'] = 'N/A' : $elem['mem_since'] = $member->mem_since;
      $member->email == NULL ? $elem['email'] = 'N/A' : $elem['email'] = $member->email;
      $elem['ok_mem_dir'] = $member->ok_mem_dir;
      $cur_yr = date('Y', time());
      $elem['silent_date'] = '';
      $member->silent_date > 1 ? $elem['silent_date'] = date('Y-m-d', $member->silent_date) : $elem['silent_date'] = 'No Date';
      $elem['silent_year'] = $member->silent_year;
      $member->usr_type == 98 ? $elem['silent'] = TRUE : $elem['silent'] = FALSE;

      $member->cur_year == 99 ? array_push($del_members, $elem) : FALSE;
//Push all the members including silent keys
      array_push($all_members, $elem);
      if(($member->cur_year >= $cur_yr  && $member->silent_date == 0) &&
        ($member->mem_type == 'Primary' || $member->mem_type == 'Individual')) {
        array_push($cur_members, $elem);
        if($elem['email'] != '') {
          array_push($cur_emails, $elem['email']);
        }
        if($member->hard_news == 'True') {
          array_push($carrier, $elem);
          $lbl_str .= $elem['fname'] . " " . $elem['lname'] . " " . $elem['callsign'] . "\n";
          $lbl_str .= $elem['address'] . "\n";
          $lbl_str .= $elem['city'] . ", " . $elem['state'] . " " . $elem['zip'] . "\n\n";
        }
      }

//Collect the data of the member who didn't pay dues
      elseif(($member->cur_year < $cur_yr && $member->silent_date == 0) &&
        ($member->mem_type == 'Primary' || $member->mem_type == 'Individual') && $member->cur_year > 0) {
        if($elem['email'] != '') {
          array_push($due_emails_arr, $elem['email']);
        }
        array_push($pay_due, $elem);
      }

//Get the silent keys
      elseif($member->usr_type == 98) {
        array_push($silent_keys, $elem);
      }
    }

//sort the emails alphabetically to detect possible erroneous emails
    array_multisort($due_emails_arr, SORT_ASC);
    array_multisort($cur_emails, SORT_ASC);

//build the text file for emails of current members for emailing The Carrier
    $emails_str = '';
    foreach($cur_emails as $email) {
      $emails_str .= $email . ', ';
    }
    file_put_contents('files/cur-emails.txt', $emails_str);

//build the text file for emails of members owing due payments
    foreach($due_emails_arr as $email) {
      $due_emails .= $email . ', ';
    }
    file_put_contents('files/due-emails.txt', $due_emails);

//build the text file for the envelope labels for mailing The Carrier
    file_put_contents('files/address-lbls.txt', $lbl_str);

//sort the arrays for displaying
    array_multisort(array_column($cur_members, 'lname'), SORT_ASC, $cur_members);
    array_multisort(array_column($carrier, 'lname'), SORT_ASC, $carrier);
    array_multisort(array_column($pay_due, 'lname'), SORT_ASC, $pay_due);
    array_multisort(array_column($all_members, 'lname'), SORT_ASC, $all_members);
    array_multisort(array_column($silent_keys, 'lname'), SORT_ASC, $silent_keys);

//build the csv file for downloading all the members
    $all_mem_str = "id,fname,lname,address,city,state,zip,email,mem type,callsign,license,cur yr,pay date,mem since,hard news,arrl,comment\n";
    foreach($all_members as $mem) {
      $all_mem_str .= $mem['id'].",".$mem['fname'].",".$mem['lname'].",".str_replace(","," ", $mem['address']).",".$mem['city'].",".$mem['state'].",".$mem['zip'].",".$mem['email'].
                      ",".$mem['mem_type'].",".$mem['callsign'].",".$mem['license'].",".$mem['cur_year'].",".$mem['pay_date'].",".$mem['mem_since'].",".
                      $mem['hard_news'].",".$mem['arrl'].",". str_replace(","," ", $mem['comment']) . "\n";
    }
    file_put_contents('files/all_members.csv', $all_mem_str);

    $retarr = array();
    $retarr['lic'] = $param['lic'];
    $retarr['states'] = $param['states'];
    $retarr['cur_members'] = $cur_members;
    $retarr['cnt_cur'] = count($cur_members);
    $retarr['cnt_carr'] = count($carrier);
    $retarr['carrier'] = $carrier;
    $retarr['cnt_pay'] = count($pay_due);
    $retarr['pay_due'] = $pay_due;
    $retarr['del_mems'] = $del_members;
    $retarr['cnt_del'] = count($del_members);
    $retarr['silent_keys'] = $silent_keys;
    $retarr['cnt_silents'] = count($silent_keys);

    return $retarr;

  }
  public function update_cur_yr() {
    $db = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $res = $builder->get()->getResult();
    foreach($res as $mem) {
      $builder->resetQuery();
      $cur_yr = trim($mem->cur_year);
      if($cur_yr == '9999') {
        $cur_yr = '2035';
      }
      $builder->update(array('c_year' => strtotime(trim($cur_yr) . '/01/01')), ['id_members' => $mem->id_members]);
    }
    $db->close();
  }

/**
* Adds or edits a member
* @param mixed $param[] for db insert and update
* @return bool $retval whether or not the email param was ok
*/
  public function edit_mem($param) {
    $retval = TRUE;
    $id = $param['id'];
    unset($param['id']);
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->where('email', $param['email']);
    $builder->where('callsign', $param['callsign']);
    $builder->where('lname', $param['lname']);
    if($id != NULL) {
      $builder->resetQuery();
      $builder->update($param, ['id_members' => $id]);
    }
    else {
    if($builder->countAllResults() == 0) {
        $param['update_type'] = 'Initial insert';
        $param['mem_type'] = 'Individual';
        $builder->resetQuery();
        $builder->insert($param);
      }
      else {
        $retval = FALSE;
      }
    }
    $db->close();

    return $retval;
  }

  public function delete_mem($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->resetQuery();
    $builder->update(array('cur_year' => 99), ['id_members' => $id]);
  }

/**
* This copies the data with silent keys to the main table. Only temporary one time script
*/
  public function set_silents() {
    $db      = \Config\Database::connect();
    $builder = $db->table('tSilentKeys');
    $silents = $builder->get()->getResult();
    $db->close();
    $db      = \Config\Database::connect();
    $builder = $db->table('tSilentKeys');
    $builder->resetQuery();
    $builder = $db->table('tMembers');
    $mems = $builder->get()->getResult();
    foreach($silents as $silent) {
      $sil_callsign = $silent->cCallPrefix . $silent->cCallSuffix;
      foreach($mems as $mem) {
        if($sil_callsign == $mem->callsign) {
          $builder->resetQuery();
          $mem_arr = array(
            'callsign' => $sil_callsign
          );
          $builder->where('id_members', $mem->id_members);
          $builder->update($mem_arr);
        }
      }
    }
    $db->close();
  }

/**
* Set silent key if the member passed
*/
  public function set_silent($param) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $id = $param['id'];
    unset($param['id']);
    $builder->resetQuery();
    $builder->update(array('usr_type' => 98,'silent_date' => time(),
    'silent_year' => date('Y', time())), ['id_members' => $id]);
    $db->close();
  }

/**
* Unset silent key in case of mistake was made
*/
  public function unset_silent($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('tMembers');
    $builder->resetQuery();
    $builder->update(array('usr_type' => 0, 'silent_date' => 0,
    'silent_year' => 0), ['id_members' => $id]);
    $db->close();
  }

}
