<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PermintaanProduk_model;

class PermintaanProduk extends Controller
{
    public function index()
    {
        $data = [];

        $model = new PermintaanProduk_model();
        $data['permintaanproduk']  = $model->getPermintaanProduk()->getResult();
        $data['produk'] = $model->getProduk()->getResult();
        echo view('permintaanproduk_tampil', $data);
    }



    public function simpan()
    {
        $model = new PermintaanProduk_model();

        $data = array(
            'permintaan_tanggal'   => $this->request->getPost('permintaan_tanggal'),
            'permintaan_produk_id'   => $this->request->getPost('permintaan_produk'),
            'permintaan_jumlah'      => $this->request->getPost('permintaan_jumlah'),
            'permintaan_status'      => $this->request->getPost('permintaan_status'),
            'permintaan_deskripsi'   => $this->request->getPost('permintaan_deskripsi'),
        );

        $model->simpanPermintaanProduk($data);
        return redirect()->to('/permintaanproduk');
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
        return redirect()->to('/permintaanproduk');
    }

    public function hapus()
    {
        $model = new PermintaanProduk_model();
        $id = $this->request->getPost('permintaan_id');
        $model->hapusPermintaanProduk($id);
        return redirect()->to('/permintaanproduk');
    }

}
