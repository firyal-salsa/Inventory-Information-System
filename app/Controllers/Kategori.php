<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Kategori_model;

class Kategori extends Controller
{
    public function index()
    {
        $model = new Kategori_model();
        $data['kategori'] = $model->getKategori()->getResult();
        echo view('kategori_tampil', $data);
    }

    public function simpan()
    {
        $model = new Kategori_model();
        $data = array(
            'kategori_id'   => $this->request->getPost('kategori_id'),
            'kategori_nama' => $this->request->getPost('kategori_nama'),
        );
        $model->simpanKategori($data);
        return redirect()->to('/kategori');
    }

    public function update()
    {
        $model = new Kategori_model();
        $id = $this->request->getPost('kategori_id');
        $data = array(
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'kategori_nama'  => $this->request->getPost('kategori_nama'),
        );
        $model->updateKategori($data, $id);
        return redirect()->to('/kategori');
    }

    public function hapus()
    {
        $model = new Kategori_model();
        $id = $this->request->getPost('kategori_id');
        $model->hapusKategori($id);
        return redirect()->to('/kategori');
    }

}
