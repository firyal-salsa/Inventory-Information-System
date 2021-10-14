<?php namespace App\Models;

use CodeIgniter\Model;

class BarangKeluar_model extends Model
{

    public function getProduk()
    {
        $builder = $this->db->table('produk');
        return $builder->get();
    }

    public function getBarangKeluar()
    {
        $builder = $this->db->table('barangkeluar');
        $builder->select('*');
        $builder->join('produk', 'produk_id = k_produk_id','left');
        $builder->orderBy('k_tanggal_transaksi', 'ASC');
        return $builder->get();
    }

    public function simpanBarangKeluar($data){
        $query = $this->db->table('barangkeluar')->insert($data);
        return $query;
    }

    public function updateBarangKeluar($data, $id)
    {
        $query = $this->db->table('barangkeluar')->update($data, array('k_id' => $id));
        return $query;
    }

    public function hapusBarangKeluar($id)
    {
        $query = $this->db->table('barangkeluar')->delete(array('k_id' => $id));
        return $query;
    }

}
