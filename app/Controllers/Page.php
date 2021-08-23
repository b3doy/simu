<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Home | SIMU-1.0"
        ];

        return view('page/index', $data);
    }
}
