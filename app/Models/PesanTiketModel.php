<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanTiketModel extends Model
{
  protected $builder;
  protected $db;
  protected $table = 'tiket';

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('tiket');
  }

  public function getAllTiket($asal = null, $tujuan = null, $tanggal = null) {
    if ($tanggal != null){
      $this->builder->select('*');
      $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
      $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
      $this->builder->where('asal', $asal);
      $this->builder->where('tujuan', $tujuan);
      $this->builder->where('tanggal_keberangkatan', $tanggal);
      $query = $this->builder->get();
      return $query->getResult();
    }
    $this->builder->select('*');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $this->builder->where('tanggal_keberangkatan >=', date("Y/m/d"));
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
}
