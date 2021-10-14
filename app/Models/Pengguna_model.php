<?php namespace App\Models;

use CodeIgniter\Model;

class Pengguna_model extends Model
{

  public function getPengguna()
  {
    return $this->db->table('tbl_user')
    ->get()->getResultArray();
  }


}
