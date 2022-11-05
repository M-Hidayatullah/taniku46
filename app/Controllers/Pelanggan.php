<?php

namespace App\Controllers;

use App\Models\M_pelanggan;
use App\Models\M_produk;
use App\Models\M_ongkir;
use App\Models\M_pembelian;
use App\Models\M_pembayaran;
use App\Models\M_review;

class Pelanggan extends BaseController
{
    protected $M_pelanggan;
    protected $M_ongkir;
    protected $M_produk;
    protected $M_pembelian;
    protected $M_pembayaran;
    protected $M_review;

    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "5c7bd44bacdf90c3bed0a6c0b986db8a";
    private $ongkir = "https://api.rajaongkir.com/starter/cost";

    public function __construct()
    {
        $this->M_pelanggan = new M_pelanggan();
        $this->M_produk = new M_produk();
        $this->M_ongkir = new M_ongkir();
        $this->M_pembelian = new M_pembelian();
        $this->M_pembayaran = new M_pembayaran();
        $this->M_review = new M_review();
    }
    public function index()
    {
        $data = [
            'title'             => 'Selamat Datang Di Taniku 46',
            'getProduk'         => $this->M_produk->ambilData(),
            'cart'              => \Config\Services::cart()
        ];
        return view('/pelanggan/v_pelanggan', $data);
    }

    public function getOngkir($id_kota_asal, $id_kota_tujuan, $berat, $kurir) 
    {


            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $this->ongkir,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin={$id_kota_asal}&destination={$id_kota_tujuan}&weight={$berat}&courier={$kurir}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "5c7bd44bacdf90c3bed0a6c0b986db8a"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            return "cURL Error #:" . $err;
            } else {
            return $response;
            }
    }

    //------------------------------- Shopping Cart ----------------------------------------

    public function kota($provinsi) {

                $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 5c7bd44bacdf90c3bed0a6c0b986db8a"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        $kota = json_decode($response, true); 

        if($kota['rajaongkir']['status']['code'] == 200) {
            echo "<option value=''>Pilih Kota</option>";
            foreach($kota['rajaongkir']['results'] as $row) {
                echo "<option value='".$row['city_id']."'>".$row['city_name']."</option>";
            }
        } else {
            echo "<option value=''>Pilih Kota</option>";
        }
        
        }
    }

    public function cek()
    {
        $cart = \Config\Services::cart();
        $respon = $cart->contents();
        echo "<pre>";
        print_r($respon);
        echo "</pre>";
    }

    public function addCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getVar('id'),
            'qty'     => 1,
            'price'   => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
            'options' => array(
                'berat' => $this->request->getVar('berat'),
                'foto_produk' => $this->request->getVar('foto_produk')
            )
        ));
        session()->setFlashdata('sukses', 'Barang berhasil dimasukkan ke keranjang belanja');
        return redirect()->to(base_url('Pelanggan'));
    }

    public function addCartdetail()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getVar('id'),
            'qty'     => 1,
            'price'   => $this->request->getVar('price'),
            'name'    => $this->request->getVar('name'),
            'options' => array(
                'berat' => $this->request->getVar('berat'),
                'foto_produk' => $this->request->getVar('foto_produk')
            )
        ));
        session()->setFlashdata('sukses', 'Barang berhasil dimasukkan ke keranjang belanja');
        return redirect()->to(base_url('Pelanggan/detailker/' . $this->request->getVar('id')));
    }

    public function clear()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('/pelanggan/kbelanja'));
    }

    

    public function kbelanja()
    {
        $data = [
            'title'     => 'Keranjang Belanja',
            'cart'      => \Config\services::cart()
        ];
        return view('pelanggan/v_kbelanja', $data);
    }

    public function hapusKeranjangId($id)
    {
        $cart = \Config\Services::cart();
        $cart->remove($id);

        session()->setFlashdata('hapus', '1 barang telah dihapus dari keranjang');
        return redirect()->to(base_url('pelanggan/kbelanja'));
    }

    public function updateCart()
    {
        $cart = \Config\services::cart();
        // dd($cart);
        $i = 1;
        foreach ($cart->contents() as $produk) {
            $cart->update(array(
                'rowid'   => $produk['rowid'],
                'qty'     => $this->request->getVar('qty' . $i++),
            ));
        }
        session()->setFlashdata('sukses', 'Keranjang berhasil diupdate');
        return redirect()->to(base_url('/pelanggan/kbelanja'));
    }

    public function detailker($id)
    {
        $data = [
            'title'     => 'Detail Produk',
            'getProduk' => $this->M_produk->ambilData($id)->getRow(),
            'cart'      => \Config\services::cart()
        ];

        return view('/pelanggan/v_detailker', $data);
    }


    private function rajaongkircost($origin, $destination, $weight, $courier)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: ".$this->apiKey,
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		return $response;
	}

    


    public function checkout()
    {
        $cart = \Config\services::cart();
        // dd($cart->contents());
        $aa = $this->M_produk->ambilData();
        $i = 1;
        foreach ($aa as $gg) {
            $jumlah = $this->request->getVar('jj' . $i++);
            // dd($gg['berat']);
            if ($jumlah > $gg['berat']) {
                session()->setFlashdata('psn', 'Stok ' . $gg['nama_produk'] . ' Kurang');
                return redirect()->to('/pelanggan/kbelanja');
            }
        }
        $data = [
            'title'     => 'Checkout',
            'cart'      => \Config\Services::cart(),
            'getOngkir' => $this->M_ongkir->ambilData(),
            'validation'    => \Config\Services::validation(),
            'datap'        => $this->M_pelanggan->ambilData(session()->get('id_pelanggan'))->getRow()

        ];

        // dd(session()->get('id_pelanggan'));
        return view('/pelanggan/v_checkout', $data);
    }

    public function berhasil($idInvoice)
    {
        $data = [
            'cart'      => \Config\Services::cart(),
            'title'     => 'Berhasil',
            'idInvoice' => $this->M_pembayaran->ambilData($idInvoice)->getRow()
        ];

        return view('/pelanggan/v_berhasil', $data);
    }

    public function upload($idInvoice)
    {
        $data = [
            'cart'      => \Config\Services::cart(),
            'title'     => 'Upload',
            'idInvoice' => $this->M_pembayaran->ambilData($idInvoice)->getRow(),
            'uri'       => \Config\Services::request()
        ];

        return view('/pelanggan/v_upload', $data);
    }
    public function aksi_upload($idInvoice)
    {
        $data = [
            'cart'      => \Config\Services::cart(),
            'title'     => "Upload",
            'idInvoice' => $this->M_pembayaran->ambilData($idInvoice)->getRow(),
            'uri'       => \Config\Services::request()
        ];
        $filegambar = $this->request->getFile('foto');

        //cek gambar
        if ($filegambar) {
            //random nama gambar
            $namagambar = $filegambar->getRandomName();

            //pindah ke folder img
            $filegambar->move('img', $namagambar);
        }
        $this->M_pembayaran->ubah([
            'bukti_transfer'    => $namagambar
        ], $idInvoice);

        session()->setFlashdata('sukses', 'Bukti transfer berhasil diupload');

        return view('/pelanggan/v_upload', $data);
    }

    public function transfer($idInvoice)
    {
        $data = [
            'cart'      => \Config\Services::cart(),
            'title'     => 'Transfer',
            'idInvoice' => $this->M_pembayaran->ambilData($idInvoice)->getRow()
        ];

        return view('/pelanggan/v_transfer', $data);
    }

    public function addCheckout()
    {
        if ($this->request->getVar('transfer')) {

            if (!$this->validate([
                'nama'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Nama harus diisi'
                    ]
                ],
                'telpon'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'No telpon harus diisi'
                    ]
                ],
                'provinsi'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'provinsi harus diisi'
                    ]
                ],
                'kurir'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'kurir harus diisi'
                    ]
                ],
                'alamat'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Alamat harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to(base_url('/pelanggan/checkout'))->withInput();
            }
            //Invoice
            $cart      = \Config\Services::cart()->contents();
            foreach ($cart as $cart) {
                $produk = $this->M_produk->ambilData($cart['id'])->getRowArray();
                // dd($produk);
                // if($produk){
                $bb = $produk['berat'];
                // dd($bb);
                $berat = $bb - $cart['qty'];
                $data = [
                    'berat' => $berat,
                ];
                $this->M_produk->ubah($data, $cart['id']);
                // } 
            }
            $no = 1;
            $this->M_pembayaran->simpan([
                'id_pembeli'    => session()->get('id_pelanggan'),
                'nama_pem'      => $this->request->getVar('nama'),
                'telpon'        => $this->request->getVar('telpon'),
                'tgl_beli'      => date('Y-m-d H:i:s'),
                'batas_bayar'   => date('Y-m-d H:i:s', mktime(
                    date('H'),
                    date('i'),
                    date('s'),
                    date('m'),
                    date('d') + 2,
                    date('Y')
                )),
                'alamat'        => $this->request->getVar('alamat'),
                'metode_pembayaran' => $this->request->getVar('transfer'),
                'aksi'        => 0
            ]);
            //mengambil id invoice terakhir
            $id_invoice = $this->M_pembayaran->insertID();

            $cart = \Config\Services::cart();
            foreach ($cart->contents() as $value) {
                $this->M_pembelian->simpan([
                    'id_invoice'      => $id_invoice,
                    'id_produk'      => $value['id'],
                    'tgl_pembelian'      => date('Y-m-d'),
                    'harga'      => $value['price'],
                    'jumlah'      => $value['qty'],
                    'id_ongkir'      => $this->request->getVar('ongkir'),
                    'total_pembelian'      => $value['subtotal']
                ]);
            }
            $cart->destroy();
            session()->setFlashdata('sukses', 'Pembelian Berhasil, silahkan melakukan konfirmasi untuk pembayaran melalui tautan dibawah');
            $data = $this->M_pembayaran->ambilData($id_invoice)->getRow();
            if ($data->metode_pembayaran == "transfer") {
                return redirect()->to(base_url('/pelanggan/upload/' . $id_invoice));
            } else {
                return redirect()->to(base_url('/pelanggan'));
            }
        } else {
            if (!$this->validate([
                'nama'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Nama harus diisi'
                    ]
                ],
                'telpon'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'No telpon harus diisi'
                    ]
                ],
                'ongkir'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Ongkir harus diisi'
                    ]
                ],
                'alamat'        => [
                    'rules'     => 'required',
                    'errors'    => [
                        'required'  => 'Alamat harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to(base_url('/pelanggan/checkout'))->withInput();
            }
            //Invoice
            $no = 1;
            $this->M_pembayaran->simpan([
                'id_pembeli'    => session()->get('id_pelanggan'),
                'nama_pem'      => $this->request->getVar('nama'),
                'telpon'        => $this->request->getVar('telpon'),
                'tgl_beli'      => date('Y-m-d H:i:s'),
                'batas_bayar'   => date('Y-m-d H:i:s', mktime(
                    date('H'),
                    date('i'),
                    date('s'),
                    date('m'),
                    date('d') + 2,
                    date('Y')
                )),
                'alamat'        => $this->request->getVar('alamat'),
                'aksi'        => 0
            ]);
            //mengambil id invoice terakhir
            $id_invoice = $this->M_pembayaran->insertID();

            $cart = \Config\Services::cart();
            foreach ($cart->contents() as $value) {
                $this->M_pembelian->simpan([
                    'id_invoice'      => $id_invoice,
                    'id_produk'      => $value['id'],
                    'tgl_pembelian'      => date('Y-m-d'),
                    'harga'      => $value['price'],
                    'jumlah'      => $value['qty'],
                    // 'id_ongkir'      => $this->request->getVar('ongkir'),
                    'total_pembelian'      => $value['subtotal']
                ]);
            }
            $cart->destroy();
            session()->setFlashdata('sukses', 'Pembelian Berhasil, silahkan melakukan konfirmasi untuk pembayaran melalui tautan dibawah');

            return redirect()->to(base_url('/pelanggan/berhasil/' . $id_invoice));
        }
    }
    //---------------------------------- Transaksi --------------------------------------------------
    public function semuaTransaksi()
    {
        $id_invoice = $this->request->getVar('idInvoice');
        // dd($id_invoice);
        $data = [
            'title'         => 'Transaksi',
            'cart'          => \Config\Services::cart(),
            'getPembayaran'    => $this->M_pembayaran->ambilIdPembeli(session()->get('id_pelanggan'))->getResultArray(),
            'cekTransaksi'  => $this->M_pembayaran->ambilIdPembeli(session()->get('id_pelanggan'))->getRow()
        ];

        return view('/pelanggan/v_transaksi', $data);
    }
    public function tf()
    {
        $id_invoice = $this->request->getVar('id');

        $filegambar = $this->request->getFile('file');

        // dd($filegambar);

        //cek gambar
        if ($filegambar) {
            //random nama gambar
            $namagambar = $filegambar->getRandomName();

            //pindah ke folder img
            $filegambar->move('img', $namagambar);
        }

        $this->M_pembayaran->buktitf([
            'bukti_transfer'    => $namagambar
        ], $id_invoice);

        session()->setFlashdata('sukses', 'Bukti berhasil diupload');
        return redirect()->to('/pelanggan/semuaTransaksi');
    }
    public function hapusPembelian($id)
    {
        $this->M_pembelian->hapuspembelian($id);
        session()->setFlashdata('hapus', 'Pembelian dibatalkan');
        return redirect()->to('/pelanggan/semuaTransaksi');
    }

    public function print($id)
    {
        $data = [
            'title'     => 'Cetak',
            'cart'      => \Config\Services::cart(),
            'Pembayaran'   => $this->M_pembayaran->ambilData($id)->getRowArray(),
            'Tblanja'   => $this->M_pembelian->ambilIdPembelian($id)->getResultArray()
        ];
        return view('/pelanggan/v_cetak', $data);
    }
    //---------------------------------- Daftar Produk --------------------------------------------------

    public function daftarproduk()
    {
        $data = [
            'title' => 'Daftar Produk',
            'cart'      => \Config\Services::cart(),
            'data' => $this->M_produk->ambilData()
        ];

        return view('pelanggan/v_dproduk', $data);
    }
    public function kontak()
    {
        $data = [
            'title' => 'Kontak',
            'cart'      => \Config\Services::cart()
        ];

        return view('pelanggan/v_kontak', $data);
    }
    public function review()
    {
        $data = [
            'title' => 'Review Pelanggan',
            'cart'      => \Config\Services::cart(),
            'review'    => $this->M_pembelian->ambilData()
        ];

        return view('pelanggan/v_review', $data);
    }
    public function AksiReview()
    {
        $data = [
            'title' => 'Review Pelanggan'
        ];

        $this->M_review->simpan([
            'id_pembelian'          => $this->request->getVar('pesanan'),
            'id_pelanggan'          => session()->get('id_pelanggan'),
            'title'                 => 'Store 19',
            'review'                => $this->request->getVar('review'),
            'tanggal_review'        => date('y-m-d')
        ]);

        session()->setFlashdata('pesan', 'Review berhasil dikirim');
        return redirect()->to('/Pelanggan/review');
    }
}
