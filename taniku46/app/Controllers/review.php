<?php namespace App\Controllers;

use App\Models\M_review;
use App\Models\M_pelanggan;
use App\Models\M_pembelian;

class review extends BaseController
{
    protected $M_review;
    protected $M_pelanggan;
    protected $M_pembelian;

    public function __construct()
    {
        $this->M_review = new M_review();
        $this->M_pelanggan = new M_pelanggan();
        $this->M_pembelian = new M_pembelian();
    }

    public function Tulisreview()
    {
        $data = [
            'title' => 'Tulis Review',
            'validation' => \Config\Services::validation(),
            'getPelanggan'     => $this->M_pelanggan->ambilData(),
            'getPembelian'     => $this->M_pembelian->ambilData()

        ];
        return view('pelanggan/tulis/v_treview',$data);
    }

    public function simpanReview()
    {
        if(!$this->validate([
            'id_pembelian'     => [
                'rules'     => 'required',
                'errors'    => [
                    'required'     => ' Id pembelian tidak boleh kosong'
                ]
            ],
            'title'        => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Title tidak boleh kosong'
                ]
            ],
            'review'        => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Review tidak boleh kosong'
                ]
            ]

        ])){
            return redirect()->to('/review/Tulisreview')->withInput();
        }

        $this->M_review->simpan([
            'id_pembelian'        => $this->request->getVar('id_pembelian'),
            'id_pelanggan'        => $this->request->getVar('id_pelanggan'),
            'tanggal_review'        => $this->request->getVar('tanggal_review'),
            'title'                => $this->request->getVar('title'),
            'review'                 => $this->request->getVar('review')
        ]);
        session()->setFlashdata('sukses','Akun berhasil dibuat');
        return redirect()->to('/review/Tulisreview');
    }
}