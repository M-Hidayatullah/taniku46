<?php namespace App\Models;

use CodeIgniter\Model;

class M_suplier extends Model
{
    protected $table = 'suplier';
    public function ambilData($id_suplier = false)
    {
        if($id_suplier === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_suplier' => $id_suplier]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_suplier' => $id]);
    }
    public function ubah($data, $id)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_suplier', $id);
        return $ubah->update($data);
    }
}