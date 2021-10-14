<?php namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{

    public function getKategori()
    {
        $builder = $this->db->table('kategori');
        $builder->select('*');
        return $builder->get();
    }

    public function simpanKategori($data){
        $query = $this->db->table('kategori')->insert($data);
        return $query;
    }

    public function updateKategori($data, $id)
    {
        $query = $this->db->table('kategori')->update($data, array('kategori_id' => $id));
        return $query;
    }

    public function hapusKategori($id)
    {
        $query = $this->db->table('kategori')->delete(array('kategori_id' => $id));
        return $query;
    }


}
