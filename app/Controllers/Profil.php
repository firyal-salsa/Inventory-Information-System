<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Profil_model;

class Profil extends Controller
{
  public function __construct()
  {
    $this->Profil_model = new Profil_model();
  }


    public function index()
    {
        $data = array(
          'title' => 'Profil',
          'tbl_user' => $this->Profil_model->getProfil(),
          'isi' => 'profil-saya'
        );
        return view('layout/v_wrapper', $data);
    }


}
