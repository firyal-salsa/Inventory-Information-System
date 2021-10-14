<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{

  public function save_register($data)
  {
    $this->db->table('tbl_user')->insert($data);
  }

  public function login($email, $password)
  {
    return $this->db->table('tbl_user')->where([
      'email'     => $email,
      'password'  => $password,
    ])->get()->getRowArray();
  }

}
