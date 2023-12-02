<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class otentikasi extends BaseController
{

    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new UserModel();
    }
    public function index()
    {
        return view("login");
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $otentik = $this->usermodel->where(['username' => $username])->first();
        if ($otentik) {

            $verifikasi  = password_verify(md5($password), password_hash($otentik['password'], PASSWORD_DEFAULT));
            if ($verifikasi) {
                $sesi = [
                    'username'      => $otentik['username'],
                    'id_users'            => $otentik['id_users'],
                    'loggedIn'     => TRUE
                ];

                $remember = $this->request->getVar('remember-me');
                if (isset($remember)) {
                    $nama = 'username';
                    $nilai = $otentik['username'];
                    $durasi = strtotime('+7 days');
                    $path = "/";
                    setcookie($nama, $nilai, $durasi, $path);
                }

                session()->set($sesi);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('pesan', 'Password salah');
                return redirect()->to('/otentikasi');
            }
        } else {
            session()->setFlashdata('pesan', 'Username tidak terdaftar!');
            return redirect()->to('/otentikasi');
        }
    }

    public function logout()
    {
        session()->destroy();
        $nama = 'username';
        $nilai = '';
        $durasi =  strtotime('-7 days');
        $path = '/';
        setcookie($nama, $nilai, $durasi, $path);
        return redirect()->to('/otentikasi');
    }
}
