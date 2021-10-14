<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengguna_model;

class Pengguna extends Controller
{
  public function __construct()
  {
    $this->Pengguna_model = new Pengguna_model;
  }


    public function index()
    {
        $data = array(
          'title' => 'Pengguna',
          'tbl_user' => $this->Pengguna_model->getPengguna(),
          'isi' => 'pengguna_tampil'
        );
        echo view('pengguna_tampil', $data);
    }


}
