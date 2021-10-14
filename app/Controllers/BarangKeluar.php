<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BarangKeluar_model;

class BarangKeluar extends Controller
{
    public function index()
    {
        $data = [];

        $model = new BarangKeluar_model();
        $data['barangkeluar']  = $model->getBarangKeluar()->getResult();
        $data['produk'] = $model->getProduk()->getResult();
        echo view('barangkeluar_tampil', $data);
    }

    public function simpan()
    {
        $model = new BarangKeluar_model();

        $data = array(
            'k_tanggal_transaksi'   => $this->request->getPost('k_tanggal_transaksi'),
            'k_produk_id'   => $this->request->getPost('k_produk'),
            'k_jumlah_terjual'      => $this->request->getPost('k_jumlah_terjual'),
        );

        $model->simpanBarangKeluar($data);
        return redirect()->to('/barangkeluar');
    }

    public function update()
    {
        $model = new BarangKeluar_model();
        $id = $this->request->getPost('k_id');
        $data = array(
          'k_tanggal_transaksi'   => $this->request->getPost('k_tanggal_transaksi'),
          'k_produk_id'   => $this->request->getPost('k_produk'),
          'k_jumlah_terjual'      => $this->request->getPost('k_jumlah_terjual'),
        );
        $model->updateBarangKeluar($data, $id);
        return redirect()->to('/barangkeluar');
    }

    public function hapus()
    {
        $model = new BarangKeluar_model();
        $id = $this->request->getPost('k_id');
        $model->hapusBarangKeluar($id);
        return redirect()->to('/barangkeluar');
    }

}
