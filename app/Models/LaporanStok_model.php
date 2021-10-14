<?php namespace App\Models;

use CodeIgniter\Model;

class LaporanStok_model extends Model
{

  public function getLaporanStok()
  {
    return $this->db->table('grafik')
    ->get()->getResultArray();
  }

  public function getProduk()
  {
      $builder = $this->db->table('produk');
      return $builder->get();
  }

  public function Laporanstok()
  {
    $builder = $this->db->table('permintaanproduk');
    $builder->select("* ");
    $builder->join('produk', 'produk_id = permintaan_produk_id','left');
    $builder->where('permintaan_status', 'Selesai');
    $builder->groupBy('produk_id');
    $builder->selectSum('permintaan_jumlah')->where('produk_id', 40);
    return $builder->get();
  }

}
