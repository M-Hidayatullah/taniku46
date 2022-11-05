<?php namespace App\Models;

use CodeIgniter\Model;

class M_ongkir extends Model
{
    protected $table = 'ongkir';
    public function ambilData($id_ongkir = false)
    {
        if($id_ongkir === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_ongkir' => $id_ongkir]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id_ongkir)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_ongkir' => $id_ongkir]);
    }
    public function ubah($data, $id_ongkir)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_ongkir', $id_ongkir);
        return $ubah->update($data);
    }
}