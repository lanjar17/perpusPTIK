<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AvatarModel;

class Avatar extends BaseController
{
    public function index($username)
    {
        $avatarModel = new AvatarModel();
        $data =
            [
                
                'item' => $avatarModel->getDetail($username)
            ];
        return view('layout/navigation', $data);
    }
}
