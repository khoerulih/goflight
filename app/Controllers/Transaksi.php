<?php

namespace App\Controllers;

use \App\Models\TiketModel;
use \App\Models\TransaksiModel;
use \App\Models\StatusTransaksiModel;
use Mpdf\Mpdf;

class Transaksi extends BaseController
{
	protected $tiketModel;
	protected $statusTransaksiModel;
	protected $transaksiModel;

  public function __construct()
  {
    $this->tiketModel = new TiketModel();
    $this->transaksiModel = new TransaksiModel();
    $this->statusTransaksiModel = new StatusTransaksiModel();
  }

	public function index()
	{
		$data = [
      'title' => 'Transaksi | GoFlight',
      'transaksi' => $this->transaksiModel->getPendingTransaksi(),
    ];
		return view('transaksi/index', $data);
	}

	public function all()
	{
		$data = [
      'title' => 'Transaksi | GoFlight',
      'transaksi' => $this->transaksiModel->getAllTransaksi(),
    ];
		return view('transaksi/all', $data);
	}

  public function save()
  {
    $tiket_id = $this->request->getVar('tiket_id');

    if (!$this->validate([
      'user_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'tiket_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'tipe_pembayaran_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'jumlah_tiket' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'total_harga' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
    ])) {
      return redirect()->to('/pesan/<?= $tiket_id; ?>');
    };
    
    $this->transaksiModel->save([
      'user_id' => $this->request->getVar('user_id'),
      'tiket_id' => $tiket_id,
      'tipe_pembayaran_id' => $this->request->getVar('tipe_pembayaran_id'),
      'jumlah_tiket' => $this->request->getVar('jumlah_tiket'),
      'total_harga' => $this->request->getVar('total_harga'),
      'tanggal_transaksi' => date("Y/m/d H:i:s"),
      'jam_keberangkatan' => $this->request->getVar('jam_keberangkatan'),
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to('/user/transaksi');
  }

  public function edit($id)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->select('id, fullname');
    $builder->where('id', user_id());
    $query = $builder->get();
    $data = [
      'title' => 'Edit Data Tiket',
      'transaksi' => $this->transaksiModel->getTransaksi($id),
      'status' => $this->statusTransaksiModel->getStatusTransaksi(),
      'user' => $query->getFirstRow(),
    ];

    return view('transaksi/edit', $data);
  }

  public function update($id)
  {
    $data = [
      'status_id' => $this->request->getVar('status_id'),
    ];

    $db      = \Config\Database::connect();
    $builder = $db->table('transaksi');
    $builder->where('transaksi_id', $id);
    $builder->update($data);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to('/transaksi');
  }

  public function exportPdf($id)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('transaksi'); 
    $builder->join('users', 'users.id = transaksi.user_id');
    $builder->join('tiket', 'tiket.tiket_id = transaksi.tiket_id');
    $builder->join('tipe_pembayaran', 'tipe_pembayaran.tipe_pembayaran_id = transaksi.tipe_pembayaran_id');
    $builder->join('status_transaksi', 'status_transaksi.status_id = transaksi.status_id');
    $builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $builder->where('transaksi_id', $id);
    $query = $builder->get();
    $transaksi = $query->getFirstRow();
    
    $body = '';
    
    $body .= '
      <h1>No Tiket : '. $transaksi->tiket_id.'</h1>
      <hr>
      <p>NIK : '. $transaksi->nik.'</p>
      <p>Nama : '. $transaksi->fullname.'</p>  
      <p>Maskapai : '. $transaksi->nama_maskapai.'</p>
      <p>Asal : '. $transaksi->asal.'</p>
      <p>Tujuan : '. $transaksi->tujuan.'</p>
      <p>Tanggal : '. $transaksi->tanggal_keberangkatan.'</p>
      <p>Jam : '. $transaksi->jam_keberangkatan.'</p>
    ';

    $mpdf = new \Mpdf\Mpdf(['debug'=>FALSE,'mode' => 'utf-8', 'orientation' => 'L']);
    $mpdf->WriteHTML(''.$body.'');
    $mpdf->Output('Tiket.pdf','I');
  }
}

?>
