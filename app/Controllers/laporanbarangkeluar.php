<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangKeluar_model;

class laporanbarangkeluar extends Controller
{

  public function index()
  {
      $data = [];

      $model = new BarangKeluar_model();
      $data['barangkeluar']  = $model->getBarangKeluar()->getResult();
      $data['produk'] = $model->getProduk()->getResult();
      echo view('laporanbarangkeluar_tampil', $data);
  }

}
