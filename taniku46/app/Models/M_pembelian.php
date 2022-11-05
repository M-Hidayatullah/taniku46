<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pembelian extends Model
{
    protected $table = 'pembelian';
    public function ambilData($id_pembelian = false)
    {
        if ($id_pembelian === false) {
            // return $this->findAll();
            return $this->db->table($this->table)
                ->join('pembayaran', 'pembayaran.id_invoice = pembelian.id_invoice')
                ->join('produk', 'produk.id_produk = pembelian.id_produk')
                ->join('ongkir', 'ongkir.id_ongkir = pembelian.id_ongkir')
                ->get()->getResultArray();
        }
        return $this->getWhere(['id_pembelian' => $id_pembelian]);
    }

    public function ambilIdInvoice($idInvoice)
    {
        return $this->db->table('pembayaran')
            ->getWhere(['id_invoice' => $idInvoice]);
    }

    public function ambilIdPembelian($idInvoice)
    {
        return $this->db->table('pembelian')
            ->join('produk', 'produk.id_produk = pembelian.id_produk')
            ->join('ongkir', 'ongkir.id_ongkir = pembelian.id_ongkir')
            ->getWhere(['id_invoice' => $idInvoice]);
    }

    public function simpan($data)
    {
        $simpan = $this->db->table($this->table);
        return $simpan->insert($data);
    }
    public function hapus($id_pembelian)
    {
        $hapus = $this->db->table($this->table);
        return $hapus->delete(['id_pembelian' => $id_pembelian]);
    }
    public function ubah($data, $id_pembelian)
    {
        $ubah = $this->db->table($this->table);
        $ubah->where('id_pembelian', $id_pembelian);
        return $ubah->update($data);
    }
    public function hapuspembelian($id)
    {
        $hapus = $this->db->table('pembayaran');
        return $hapus->delete(['id_invoice' => $id]);
    }
    public function totalpembelian()
    {
        return $this->db->table($this->table)
            ->join('ongkir', 'ongkir.id_ongkir = pembelian.id_ongkir')->get()->getResultArray();
    }
    public function caridata()
    {
        // return $this->query("SELECT * FROM pembelian WHERE 
        // pembayaran.id_invoice = pembelian.id_invoice AND produk','produk.id_produk = pembelian.id_produk
        // GROUP BY id_produk")->getResultArray();
        return $this->db->table($this->table)
            ->select('id_produk, harga')
            // ->join('produk','produk.id_produk = pembelian.id_produk')
            ->selectSum('jumlah')
            ->groupBy('id_produk')
            ->get()->getResultArray();
    }
    public function data()
    {
        return $this->db->table('produk')
            ->get()->getResultArray();
    }
}
