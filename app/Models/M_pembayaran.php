<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pembayaran extends Model
{
    protected $table = 'pembayaran';
    public function ambilData($id_invoice = false)
    {
        if ($id_invoice === false) {
            // return $this->findAll();
            return $this->db->table($this->table)
                ->orderBy('id_invoice', 'DESC')
                ->get()->getResultArray();
        }
        return $this->getWhere(['id_invoice' => $id_invoice]);
    }

    public function ambilIdPembeli($idPembeli)
    {
        return $this->db->table($this->table)
            ->orderBy('id_invoice', 'DESC')
            ->getWhere(['id_pembeli' => $idPembeli]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id_invoice)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_invoice' => $id_invoice]);
    }
    public function hapusPesanan($id_invoice)
    {
        $hapus = $this->db->table('pembelian');
        return $hapus->delete(['id_invoice' => $id_invoice]);
    }
    public function ubah($data, $id_invoice)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_invoice', $id_invoice);
        return $ubah->update($data);
    }

    public function jumlahPesanan()
    {
        $this->select('pembayaran.*');
        $this->where(array('aksi' => 1));
        $query = $this->get();
        return $query->getResultArray();
    }

    public function pesananMasuk()
    {
        $this->select('pembayaran.*');
        $this->where(array('aksi' => 0));
        $query = $this->get();
        return $query->getResultArray();
    }
    public function masuk()
    {
        return $this->db->table('pembelian')->countAll();
    }

    public function buktitf($data, $id_invoice)
    {
        return $this->db->table($this->table)->where('id_invoice', $id_invoice)->update($data);
    }
}
