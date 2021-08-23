<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => "Users | SIMU-1.0",
            'users' => $this->userModel->getUser()
        ];
        // dd($data);

        return view('users/index', $data);
    }
}
