<?php namespace App\Controllers;

use App\Models\M_laporan;
use App\Models\M_pembelian;

class Laporan extends BaseController
{
    protected $M_laporan;
    protected $M_pembelian;

    public function __construct()
    {
        $this->M_laporan = new M_laporan();
        $this->M_pembelian = new M_pembelian();
    }

    public function carilaporan()
    {
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        $data = [
            'caridata'          => $this->M_laporan->cari($bulan, $tahun),
            'title'         => 'Laporan',
            'bulan'         => $this->request->getVar('bulan'),
            'tahun'         => $this->request->getVar('tahun'),
            'db'            => \Config\Database::connect(),
            'data'          => $this->M_pembelian->caridata()
        ];

        return view('/admin/v_cetakLaporan2', $data);
    }
    public function cetak1()
    {
        $data = [
            'title'     => 'Cetak Laporan',
            'db'            => \Config\Database::connect(),
            'data'          => $this->M_pembelian->caridata()
        ];

        return view('/admin/v_cetak1', $data);
    }
    public function cetak2($bulan, $tahun)
    {
        $data = [
            'caridata'          => $this->M_laporan->cari($bulan, $tahun),
            'title'     => 'Cetak Laporan',
            'db'            => \Config\Database::connect(),
            'data'          => $this->M_pembelian->caridata()
        ];

        return view('/admin/v_cetak2', $data);
    }
}