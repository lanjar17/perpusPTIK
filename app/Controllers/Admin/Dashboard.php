<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BukuModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $data = [
            'menu' => 'halDashboard',
            'mahasiswa' => array(
                [
                    'nama' => 'Lanjar',
                    'nim' => 'K3520038',
                    'ipk' => 3.5
                ], [
                    'nama' => 'Dwi',
                    'nim' => 'K3520029',
                    'ipk' => 3.6
                ], [
                    'nama' => 'Saputro',
                    'nim' => 'K3520030',
                    'ipk' => 3.7
                ]
            )
        ];
        return view('dashboard', $data);
    }

    public function buku(): string
    {
        // $data = [
        //     'menu' => 'halBuku',
        //     'buku' => array(
        //         [
        //             'judul' => 'Desain Web',
        //             'pengarang' => 'Nurcahya',
        //             'penerbit' => 'Informatika'
        //         ], [
        //             'judul' => 'OSK',
        //             'pengarang' => 'Pradana',
        //             'penerbit' => 'Intan Cendikia'
        //         ], [
        //             'judul' => 'Statistik Terapan',
        //             'pengarang' => 'Taufik',
        //             'penerbit' => 'Elex Media'
        //         ]
        //     )
        // ];
        // return view('buku', $data);
        {
            $bukuModel = new BukuModel();
            $data =
            [
                'menu' => 'halBuku',
                'nama' => "Administrator",
                'link' => "buku",
                'list' => $bukuModel->findAll()
            ];
            return view('buku', $data);
        }
    }

    // public function user(): string
    // {
    //     $data = [
    //         'menu' => 'halUser',
    //         'buku' => array(
    //             [
    //                 'judul' => 'Desain Web',
    //                 'pengarang' => 'Nurcahya',
    //                 'penerbit' => 'Informatika'
    //             ], [
    //                 'judul' => 'OSK',
    //                 'pengarang' => 'Pradana',
    //                 'penerbit' => 'Intan Cendikia'
    //             ], [
    //                 'judul' => 'Statistik Terapan',
    //                 'pengarang' => 'Taufik',
    //                 'penerbit' => 'Elex Media'
    //             ]
    //         )
    //     ];
    //     return view('user', $data);
    // }

    public function user()
    {
        $userModel = new UserModel();
        $data =
            [
                'menu' => 'halUser',
                'nama' => "Administrator",
                'link' => "user",
                'list' => $userModel->findAll()
            ];
        return view('user', $data);
    }
}
