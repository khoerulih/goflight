<?php

namespace App\Controllers;

use \App\Models\TiketModel;
use \App\Models\MaskapaiModel;
use \App\Models\KelasTiketModel;

class Tiket extends BaseController
{
	protected $tiketModel;
	protected $maskapaiModel;
	protected $kelasTiketModel;

  public function __construct()
  {
    $this->tiketModel = new TiketModel();
    $this->maskapaiModel = new MaskapaiModel();
    $this->kelasTiketModel = new KelasTiketModel();
  }

	public function index()
	{
		$data = [
      'title' => 'Tiket | GoFlight',
      'tiket' => $this->tiketModel->getAllTiket(),
    ];
		return view('tiket/index', $data);
	}

  public function create()
  {
    
    $data = [
      'title' => 'Tambah Data Tiket',
      'maskapai' => $this->maskapaiModel->getAllMaskapai(),
      'kelas' => $this->kelasTiketModel->getKelasTiket(),
      'validation' => \Config\Services::validation()
    ];

    return view('tiket/create', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'kelas_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'maskapai_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'asal' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'tujuan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'harga_tiket' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'tanggal_keberangkatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'jam_keberangkatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
    ])) {
      return redirect()->to('/tiket/create');
    };

    $this->tiketModel->save([
      'kelas_id' => $this->request->getVar('kelas_id'),
      'maskapai_id' => $this->request->getVar('maskapai_id'),
      'asal' => $this->request->getVar('asal'),
      'tujuan' => $this->request->getVar('tujuan'),
      'harga_tiket' => $this->request->getVar('harga_tiket'),
      'tanggal_keberangkatan' => $this->request->getVar('tanggal_keberangkatan'),
      'jam_keberangkatan' => $this->request->getVar('jam_keberangkatan'),
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to('/tiket');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Edit Data Tiket',
      'validation' => \Config\Services::validation(),
      'tiket' => $this->tiketModel->getTiket($id),
      'maskapai' => $this->maskapaiModel->getAllMaskapai(),
      'kelas' => $this->kelasTiketModel->getKelasTiket(),
    ];

    return view('tiket/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'kelas_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'maskapai_id' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'asal' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'tujuan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'harga_tiket' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'tanggal_keberangkatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
      'jam_keberangkatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
        ]
      ],
    ])) {
      return redirect()->to('/tiket/edit');
    };

    $data = [
      'kelas_id' => $this->request->getVar('kelas_id'),
      'maskapai_id' => $this->request->getVar('maskapai_id'),
      'asal' => $this->request->getVar('asal'),
      'tujuan' => $this->request->getVar('tujuan'),
      'harga_tiket' => $this->request->getVar('harga_tiket'),
      'tanggal_keberangkatan' => $this->request->getVar('tanggal_keberangkatan'),
      'jam_keberangkatan' => $this->request->getVar('jam_keberangkatan'),
    ];

    $db      = \Config\Database::connect();
    $builder = $db->table('tiket');
    $builder->where('tiket_id', $id);
    $builder->update($data);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to('/tiket');
  }

  public function delete($id)
  {
    $this->tiketModel->deleteTiket($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('/tiket');
  }
}

?>
