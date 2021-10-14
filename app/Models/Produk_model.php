<?php namespace App\Models;

use CodeIgniter\Model;

class Produk_model extends Model
{

    public function getKategori()
    {
        $builder = $this->db->table('kategori');
        return $builder->get();
    }

    public function getProduk()
    {
        $builder = $this->db->table('produk');
        $builder->select('*');
        $builder->join('kategori', 'kategori_id = produk_kategori_id','left');
        return $builder->get();
    }

    public function simpanProduk($data){
        $query = $this->db->table('produk')->insert($data);
        return $query;
    }

    public function updateProduk($data, $id)
    {
        $query = $this->db->table('produk')->update($data, array('produk_id' => $id));
        return $query;
    }

    public function hapusProduk($id)
    {
        $query = $this->db->table('produk')->delete(array('produk_id' => $id));
        return $query;
    }


}
