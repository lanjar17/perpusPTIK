<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;


class User extends BaseController
{

    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userModel = new UserModel();
        $data =
            [
                'menu' => 'halUser',
                'nama' => "Administrator",
                'link' => "user",
                'list' => $userModel->findAll()
            ];
        return view('user/user', $data);
    }

    public function detail($username)
    {
        $userModel = new UserModel();
        $data =
        [
            'menu' => 'halUser',
            'nama' => "Administrator",
            'link' => "user",
            'item' => $userModel->getDetail($username)
        ];
        return view('user/detail', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $data = 
        [
            'menu' => 'halUser',
            'nama' => 'Administrator',
            'link' => 'user'
        ];
        return view('user/form', $data);
    }

    public function insert()
    {
        $userModel = new UserModel();

        $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $avatar->move(ROOTPATH . 'public/img/avatar');
            $namaavatar = $avatar->getName();
        } else {
            $namaavatar = 'default.jpg';
        }

        $data = [
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar,
        ];

        $userModel->save($data);
        session()->setFlashdata('sukses', 'Data anggota berhasil ditambahkan');
        return redirect()->to('/user');
    }

    public function insertxx()
    {
        $userModel = new UserModel();

        $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
        if ($this->request->getFile('avatar')->getName() != '') {
            $avatar = $this->request->getFile('avatar');
            $avatar->move(ROOTPATH . 'public/img/avatar');
            $namaavatar = $avatar->getName();
        } else {
            $namaavatar = 'default.jpg';
        }

        $data = [
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar,
        ];

        $userModel->save($data);
        
    }

    public function insertAjax()
    {
        $userModel = new UserModel();
        $validasi = \Config\Services::validation();

        $valid = $this->validate([
            'namadepan' => [
                'label' => 'Nama Depan',
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 10 karakter'
                ]
            ],
            'namabelakang' => [
                'label' => 'Nama Belakang',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ]
        ]);

        if(!$valid){
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'namabelakang' => $validasi->getError('namabelakang'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else{
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $avatar->move(ROOTPATH . 'public/img/avatar');
                $namaavatar = $avatar->getName();
            } else {
                $namaavatar = 'default.jpg';
            }
        }        

        $data = [
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'avatar' => $namaavatar,
        ];

        $this->userModel->save($data);

        $pesan = [
            'sukses' => 'Data anggota berhasil diinput'
        ];
        return $this->response->setJSON($pesan);
    }

    
    public function getData()
    {
        if ($this->request->isAJAX()) {
            $userModel = new UserModel();
            $data = [
                'list' => $this->userModel->find()
            ];
            $hasil = [
                'data' => view('user/list', $data)
            ];
            // echo json_encode($hasil);
        } else {
            exit('Data tidak dapat diakses :p');
        }
        return $this->response->setJSON($hasil);
    }

    // public function getForm()
    // {
    //     if ($this->request->isAJAX()) {
    //         $hasil = [
    //             'data' => view('user/tambah')
    //         ];
    //         echo json_encode($hasil);
    //     } else {
    //         exit('Data tidak dapat diload');
    //     }
    // }


    // public function getdata()
    // {
    //     if ($this->request->isAJAX()) {
    //         $userModel = new UserModel();
    //         $data = [
    //                 'list' => $userModel->findAll()
    //             ];
    //         $hasil = [
    //             'data' => view('user/list', $data)
    //         ];
    //         echo json_encode($hasil);
    //     } else {
    //         exit('Data tidak dapat diload');
    //     }
    // }
}
