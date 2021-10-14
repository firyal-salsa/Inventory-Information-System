<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PermintaanProduk_model;

class Gudang extends Controller
{

  public function index()
  {
      $data = [];

      $model = new PermintaanProduk_model();
      $data['permintaanproduk']  = $model->getPermintaanProduk()->getResult();
      $data['produk'] = $model->getProduk()->getResult();
      echo view('permintaanprodukgudang_tampil', $data);
  }

  public function update()
  {
      $model = new PermintaanProduk_model();
      $id = $this->request->getPost('permintaan_id');
      $data = array(
        'permintaan_tanggal'   => $this->request->getPost('permintaan_tanggal'),
        'permintaan_status'      => $this->request->getPost('permintaan_status'),
        'permintaan_deskripsi'   => $this->request->getPost('permintaan_deskripsi'),
      );
      $model->updatePermintaanProduk($data, $id);
      return redirect()->to('/gudang');
  }


}
