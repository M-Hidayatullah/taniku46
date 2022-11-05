<?php namespace App\Models;

use CodeIgniter\Model;

class M_laporan extends Model
{
    public function cari($bulan, $tahun)
    {
        return $this->query("SELECT * FROM pembelian WHERE MONTH(tgl_pembelian) = $bulan and YEAR(tgl_pembelian) = $tahun")->getResultArray();
    }
}