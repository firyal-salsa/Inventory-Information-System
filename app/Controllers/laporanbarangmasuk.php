<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangMasuk_model;

class laporanbarangmasuk extends Controller
{

  public function index()
  {
      $data = [];

      $model = new BarangMasuk_model();
      $data['permintaanproduk']  = $model->getBarangMasuk()->getResult();
      $data['produk'] = $model->getProduk()->getResult();

      echo view('laporanbarangmasuk_tampil', $data);
  }

}
