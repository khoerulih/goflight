<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{
  protected $builder;
  protected $db;
  protected $table = 'tiket';
  protected $useTimestamps = true;
  protected $allowedFields = ['kelas_id', 'maskapai_id', 'asal', 'tujuan', 'harga_tiket', 'tanggal_keberangkatan', 'jam_keberangkatan'];

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('tiket');
  }

  public function getAllTiket() {
    $this->builder->select('*');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function getTiket($id){
    $this->builder->select('*');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $this->builder->where('tiket_id', $id);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }

  public function deleteTiket($id) {
    $this->builder->where('tiket_id', $id);
    $this->builder->delete();
  }
}
