<?php namespace App\Models;

use CodeIgniter\Model;

class PermintaanProduk_model extends Model
{

    public function getProduk()
    {
        $builder = $this->db->table('produk');
        return $builder->get();
    }

    public function getPermintaanProduk()
    {
        $builder = $this->db->table('permintaanproduk');
        $builder->select('*');
        $builder->join('produk', 'produk_id = permintaan_produk_id','left');
        $builder->orderBy('permintaan_tanggal', 'ASC');
        return $builder->get();
    }

    public function simpanPermintaanProduk($data){
        $query = $this->db->table('permintaanproduk')->insert($data);
        return $query;
    }

    public function updatePermintaanProduk($data, $id)
    {
        $query = $this->db->table('permintaanproduk')->update($data, array('permintaan_id' => $id));
        return $query;
    }

    public function hapusPermintaanProduk($id)
    {
        $query = $this->db->table('permintaanproduk')->delete(array('permintaan_id' => $id));
        return $query;
    }


}
