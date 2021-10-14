<?php namespace App\Models;

use CodeIgniter\Model;

class BarangMasuk_model extends Model
{

    public function getProduk()
    {
        $builder = $this->db->table('produk');
        return $builder->get();
    }

    public function getBarangMasuk()
    {
        $builder = $this->db->table('permintaanproduk');
        $builder->select("* ");
        $builder->join('produk', 'produk_id = permintaan_produk_id','left');
        $builder->where('permintaan_status', 'Selesai');
        $builder->orderBy('permintaan_tanggal', 'ASC');
        return $builder->get();

        
    }


}
