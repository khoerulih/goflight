<?php

namespace App\Controllers;

use \App\Models\PesanTiketModel;
use \App\Models\TipePembayaranModel;
use \App\Models\StatusTransaksiModel;

class Pesan extends BaseController
{
	protected $pesanTiketModel;
	protected $tipePembayaranModel;
	protected $statusTransaksiModel;

  public function __construct()
  {
    $this->pesanTiketModel = new PesanTiketModel();
    $this->tipePembayaranModel = new TipePembayaranModel();
    $this->statusTransaksiModel = new StatusTransaksiModel();
  }

	public function index()
	{
		$asal = $this->request->getVar('asal');
		$tujuan = $this->request->getVar('tujuan');
		$tanggal = $this->request->getVar('tanggal_keberangkatan');
		$data = [
			'title' => 'Pesan Tiket | GoFlight',
			'tiket' => $this->pesanTiketModel->getAllTiket($asal, $tujuan, $tanggal),
		];
		return view('pesan/index', $data);
	}

	public function detail($id)
	{
		$data = [
			'title' => 'Detail | GoFlight',
			'tipe_pembayaran' => $this->tipePembayaranModel->getTipePembayaran(),
			'status_transaksi' => $this->statusTransaksiModel->getStatusTransaksi(),
			'tiket' => $this->pesanTiketModel->getTiket($id),
		];
		return view('pesan/detail', $data);
	}
}

?>
