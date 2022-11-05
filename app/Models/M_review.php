<?php namespace App\Models;

use CodeIgniter\Model;

class M_review extends Model
{
    protected $table = 'review';
    public function ambilData($id_review = false)
    {
        if($id_review === false){
            // return $this->findAll();
            return $this->db->table($this->table)
            ->join('pembelian','pembelian.id_pembelian = review.id_pembelian')
            ->join('pelanggan','pelanggan.id_pelanggan = review.id_pelanggan')
            ->get()->getResultArray();
        }
            return $this->db->table($this->table)
            ->join('pembelian','pembelian.id_pembelian = review.id_pembelian')
            ->join('pelanggan','pelanggan.id_pelanggan = review.id_pelanggan')
            ->getWhere(['id_review' => $id_review]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_review' => $id]);
    }
   
}