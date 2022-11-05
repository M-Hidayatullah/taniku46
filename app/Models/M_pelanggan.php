<?php namespace App\Models;

use CodeIgniter\Model;

class M_pelanggan extends Model
{
    protected $table = 'pelanggan';
    public function ambilData($id_pelanggan = false)
    {
        if($id_pelanggan === false){
            return $this->findAll();
        }
        return $this->getWhere(['id_pelanggan' => $id_pelanggan]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id_pelanggan)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_pelanggan' => $id_pelanggan]);
    }
    public function ubah($data, $id_pelanggan)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_pelanggan', $id_pelanggan);
        return $ubah->update($data);
    }
    public function jumlahPelanggan()
    {
        return $this->db->table($this->table)->countAll();
    }
}