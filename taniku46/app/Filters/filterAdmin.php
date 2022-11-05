<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class filterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('log_in') != true){
            //session()->setFlashdata('gagal','Anda harus login terlebih dahulu');
            return redirect()->to(base_url('/pelanggan/'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->get('log_in') == true){
            return redirect()->to(base_url('/admin'));
        }
    }
}