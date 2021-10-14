<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LaporanStok_model;

class LaporanStok extends Controller
{

  public function index()
  {
      $data = [];

      $model = new LaporanStok_model();
      $data['permintaanproduk'] = $model->laporanstok()->getResult();
      $data['produk']   = $model->getProduk()->getResult();

      echo view('laporanstok_tampil', $data);
  }

}
