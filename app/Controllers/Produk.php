<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Produk_model;

class Produk extends Controller
{
    public function index()
    {
      $data = [];

        $model = new Produk_model();
        $data['produk']   = $model->getProduk()->getResult();
        $data['kategori'] = $model->getKategori()->getResult();
        echo view('produk_tampil', $data);
    }

    public function simpan()
    {
        $model = new Produk_model();

        $data = array(
            'produk_sku'     => $this->request->getPost('produk_sku'),
            'produk_nama'        => $this->request->getPost('produk_nama'),
            'produk_rak'        => $this->request->getPost('produk_rak'),
            'produk_satuan'        => $this->request->getPost('produk_satuan'),
            'produk_kategori_id' => $this->request->getPost('produk_kategori'),
            'produk_gambar'      => $this->request->getPost('produk_gambar'),
        );

        $model->simpanProduk($data);
        return redirect()->to('/produk');
    }

    public function update()
    {
        $model = new Produk_model();
        $id = $this->request->getPost('produk_id');
        $data = array(
          'produk_sku'     => $this->request->getPost('produk_sku'),
          'produk_nama'        => $this->request->getPost('produk_nama'),
          'produk_rak'        => $this->request->getPost('produk_rak'),
          'produk_satuan'      => $this->request->getPost('produk_satuan'),
          'produk_kategori_id' => $this->request->getPost('produk_kategori'),
          'produk_gambar'      => $this->request->getPost('produk_gambar'),
        );
        $model->updateProduk($data, $id);
        return redirect()->to('/produk');
    }

    public function hapus()
    {
        $model = new Produk_model();
        $id = $this->request->getPost('produk_id');
        $model->hapusProduk($id);
        return redirect()->to('/produk');
    }

}
