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

    public function detail($id_users)
    {
        $userModel = new UserModel();
        $data =
            [
                'menu' => 'halUser',
                'item' => $this->userModel->find($id_users)
                // 'item' => $userModel->getDetail($id_users)
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

    public function tambah()
    {
        if ($this->request->isAjax()) {
            $hasil = ['data' => view('user/tambah')];
        } else {
            exit('Data tidak dapat diload');
        }
        return $this->response->setJSON($hasil);
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
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 4 karakter'
                ]
            ],
            'namabelakang' => [
                'label' => 'Nama Belakang',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong']
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[5]|is_unique[users.username]',
                'errors' => [
                    'is_unique' => '{field} sudah terdaftar',
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 5 karakter'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]|regex_match[/^(?=.*?\d)(?=.*?[a-zA-Z])[a-zA-Z\d]+$/]',
                'errors' => [
                    'regex_match' => '{field} terdiri dari angka dan huruf',
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 10 karakter'
                ]
            ],
            'conpass' => [
                'label' => 'Ulangi Password',
                'rules' => 'required|min_length[3]|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} tidak sesuai',
                    'min_length' => '{field} minimal 10 karakter'
                ]
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'namabelakang' => $validasi->getError('namabelakang'),
                    'username' => $validasi->getError('username'),
                    'password' => $validasi->getError('password'),
                    'conpass' => $validasi->getError('conpass'),
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
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
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
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
                'list' => $this->userModel->findAll()
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

    public function edit($id_users)
    {
        if ($this->request->isAJAX()) {
            $item = $this->userModel->find($id_users);
            $nama = explode(" ", $item['nama']);
            $data = [
                'id_users' => $item['id_users'],
                'nama_depan' => $nama[0],
                'nama_belakang' => $nama[1],
                'alamat' => $item['alamat'],
                'tempat_lahir' => $item['tempat_lahir'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'telepon' => $item['telepon'],
                'email' => $item['email'],
                'avatar' => $item['avatar']
            ];
            $hasil = [
                'data' => view('user/edit', $data)
            ];
            return $this->response->setJSON($hasil);
        } else {
            exit('data tidak dapat diload');
        }
    }

    public function update($id_users)
    {
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
            ],
        ]);

        if (!$valid) {
            $pesan = [
                'error' => [
                    'namadepan' => $validasi->getError('namadepan'),
                    'namabelakang' => $validasi->getError('namabelakang')
                ]
            ];
            return $this->response->setJSON($pesan);
        } else {
            $nama = $this->request->getVar('namadepan') . " " . $this->request->getVar('namabelakang');
            if ($this->request->getFile('avatar')->getName() != '') {
                $avatar = $this->request->getFile('avatar');
                $avatar->move(ROOTPATH . 'public/img/avatar');
                $namaavatar = $avatar->getName();
            } else {
                $namaavatar = $this->request->getVar('avalama');
            }
        }

        $input = [
            'id_users' => $id_users,
            'nama' => $nama,
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'telepon' => $this->request->getVar('telepon'),
            'email' => $this->request->getVar('email'),
            'avatar' => $namaavatar,
        ];

        $this->userModel->save($input);

        $pesan = [
            'sukses' => 'Data anggota berhasil diupdate '
        ];
        return $this->response->setJSON($pesan);
    }
    
    public function delete($id_users)
    {
        if ($this->request->isAjax()) {
            $this->userModel->delete($id_users);
            $pesan = ['sukses' => "Data dengan ID = $id_users berhasil dihapus"];
        } else {
            exit('tidak dapat memproses data');
        }
        return $this->response->setJSON($pesan);
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
