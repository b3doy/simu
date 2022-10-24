<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => "Home | SIMU-1.0"
		];

		return view('landing', $data);
	}
}
