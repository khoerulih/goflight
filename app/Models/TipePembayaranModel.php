<?php

namespace App\Models;

use CodeIgniter\Model;

class TipePembayaranModel extends Model
{
  protected $builder;
  protected $db;
  protected $table = 'tipe_pembayaran';

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('tipe_pembayaran');
  }

  public function getTipePembayaran(){
    $this->builder->select('*');
    $query = $this->builder->get();
    return $query->getResult();
  }
}
