<?php namespace App\Models;

use CodeIgniter\Model;
/**
* This model is for special functions for Master user
*/
class Master_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
  }
/**
* Gets user types and puts them into csv file
*/
public function put_user_types() {
  $db      = \Config\Database::connect();
  $builder = $db->table('user_types');
  $res = $builder->get()->getResult();
  $types_str = "id,type code,description,code string,controller\n";
  foreach($res as $type) {
    $types_str .= $type->id_user_types.",".$type->type_code.",".$type->description.",".$type->code_str.",".$type->controller."\n";
  }
  file_put_contents('files/user_types.csv', $types_str);
  $db->close();
}

/**
* Gets users and puts them into csv file
*/
  public function put_users() {
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $res = $builder->get()->getResult();
    $users_str = "id,type code,role,username,authorized,active\n";
    foreach($res as $user) {
      $users_str .= $user->id_user.",".$user->type_code.",".$user->role.",".$user->username.",".$user->authorized.",".$user->active."\n";
    }
    file_put_contents('files/users.csv', $users_str);
    $db->close();
  }

  /**
  * Gets data for displaying master_view
  * @return string array $retval
  */
  public function get_master_data() {
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $res = $builder->get()->getResult();
    $users = array();
    foreach($res as $user) {
//finish code
    }
//todo: finish the rest
    $db->close();
  }
}
