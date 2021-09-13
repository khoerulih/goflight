<?php

namespace App\Controllers;

use \App\Models\TransaksiModel;

class User extends BaseController
{
	protected $transaksiModel;

  public function __construct()
  {
    $this->transaksiModel = new TransaksiModel();
  }

	public function index()
	{
		$data = [
			'title' => 'MyTiket | GoFlight',
			'transaksi' => $this->transaksiModel->getSuccessTransactionUser(),
		];
		return view('user/index', $data);
	}

	public function transaksi()
	{
		$data = [
			'title' => 'Transaksi | GoFlight',
			'transaksi' => $this->transaksiModel->getAllTransaksiUser(),
		];
		return view('user/transaksi', $data);
	}
}

?>
