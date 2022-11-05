<?php namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table = 'admin';
    public function ambilData($id_admin = false)
    {
        if($id_admin === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_admin' => $id_admin]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id_admin)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_admin' => $id_admin]);
    }
    public function ubah($data, $id_admin)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_admin', $id_admin);
        return $ubah->update($data);
    }
}