<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusTransaksiModel extends Model
{
  protected $builder;
  protected $db;
  protected $table = 'status_transaksi';

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('status_transaksi');
  }

  public function getStatusTransaksi(){
    $this->builder->select('*');
    $query = $this->builder->get();
    return $query->getResult();
  }
}
