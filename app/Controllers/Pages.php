<?php

namespace App\Controllers;

use \App\Models\MaskapaiModel;

class Pages extends BaseController
{
	protected $maskapaiModel;

  public function __construct()
  {
    $this->maskapaiModel = new MaskapaiModel();
  }

	public function index()
	{
		if(in_groups('admin')) {
			return redirect()->to('/admin');
		}
		$data = [
			'title' => 'GoFlight',
			'maskapai' => $this->maskapaiModel->getAllMaskapai(),
		];
		return view('pages/landing', $data);
	}

	public function about()
	{
		$data['title'] = 'About Us | GoFlight';
		return view('pages/about', $data);
	}
}
