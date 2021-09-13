<?php

namespace App\Controllers;

use \App\Models\MaskapaiModel;

class Maskapai extends BaseController
{
	protected $maskapaiModel;

  public function __construct()
  {
    $this->maskapaiModel = new MaskapaiModel();
  }

	public function index()
	{
		$data = [
      'title' => 'Maskapai | GoFlight',
      'maskapai' => $this->maskapaiModel->getAllMaskapai(),
    ];
		return view('maskapai/index', $data);
	}

  public function create()
  {
    $data = [
      'title' => 'Tambah Data Maskapai',
      'validation' => \Config\Services::validation()
    ];

    return view('maskapai/create', $data);
  }

  public function save()
  {
    if (!$this->validate([
      'nama_maskapai' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
          'is_unique' => '{field} sudah terdaftar'
        ]
      ],
      'maskapai_logo' => [
        'rules' => 'max_size[maskapai_logo,1024]|is_image[maskapai_logo]|mime_in[maskapai_logo,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar maksimal 1mb',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar',
        ]
      ]
    ])) {
      return redirect()->to('/maskapai/create')->withInput();
    };

    $fileLogo = $this->request->getFile('maskapai_logo');
    $namaLogo = $fileLogo->getRandomName();
    $fileLogo->move('img/maskapai_logo/', $namaLogo);
    

    $this->maskapaiModel->save([
      'nama_maskapai' => $this->request->getVar('nama_maskapai'),
      'maskapai_logo' => $namaLogo
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to('/maskapai');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Edit Data Maskapai',
      'validation' => \Config\Services::validation(),
      'maskapai' => $this->maskapaiModel->getMaskapai($id)
    ];

    return view('maskapai/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'nama_maskapai' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.',
          'is_unique' => '{field} sudah terdaftar'
        ]
      ],
      'maskapai_logo' => [
        'rules' => 'max_size[maskapai_logo,1024]|is_image[maskapai_logo]|mime_in[maskapai_logo,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar maksimal 1mb',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar',
        ]
      ]
    ])) {
      return redirect()->to('/maskapai/edit/' . $this->request->getVar('maskapai_id'))->withInput();
    };

    $fileLogo = $this->request->getFile('maskapai_logo');

    // cek gambar, apakah tetap gambar lama
    if ($fileLogo->getError() == 4) {
      $namaLogo = $this->request->getVar('logoLama');
    } else {
      // generate nama file random
      $namaLogo = $fileLogo->getRandomName();
      // pindahkan gamabr
      $fileLogo->move('img/maskapai_logo/', $namaLogo);
      // hapus file lama
      unlink('img/maskapai_logo/' . $this->request->getVar('logoLama'));
    }

    $data = [
      'nama_maskapai' => $this->request->getVar('nama_maskapai'),
      'maskapai_logo' => $namaLogo
    ];

    $db      = \Config\Database::connect();
    $builder = $db->table('maskapai');
    $builder->where('maskapai_id', $id);
    $builder->update($data);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to('/maskapai');
  }

  public function delete($id)
  {
    $maskapai = $this->maskapaiModel->getMaskapai($id);

    if ($maskapai->maskapai_logo != 'default.jpg') {
      unlink('img/maskapai_logo/' . $maskapai->maskapai_logo);
    }

    $this->maskapaiModel->deleteMaskapai($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus.');
    return redirect()->to('/maskapai');
  }

}

?>
