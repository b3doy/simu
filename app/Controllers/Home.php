<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$data = [
			'title' => "Home | SIMU-1.0"
		];

		return view('landing', $data);
	}
}
