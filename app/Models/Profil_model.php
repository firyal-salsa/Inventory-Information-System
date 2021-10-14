<?php namespace App\Models;

use CodeIgniter\Model;

class Profil_model extends Model
{

  public function getProfil()
  {
    return $this->db->table('tbl_user')
    ->get()->getResultArray();
  }


}
