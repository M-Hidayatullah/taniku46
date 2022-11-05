<?php namespace App\Models;

use CodeIgniter\Model;

class M_kategori extends Model
{
    protected $table = 'kategori';
    public function ambilData($id_kategori = false)
    {
        if($id_kategori === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_kategori' => $id_kategori]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_kategori' => $id]);
    }
    public function ubah($data, $id)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_kategori', $id);
        return $ubah->update($data);
    }
}