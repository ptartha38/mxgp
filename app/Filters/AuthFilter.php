<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->logged_in != TRUE) {
            return redirect()->to(base_url('/'))->with('login_error', "Anda Belum Login, Silahkan Login Terlebih Dahulu");
        }
        // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->NRP != null) {
            return redirect()->to(base_url('/Home'));
        }
    }
}
