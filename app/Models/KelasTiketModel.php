<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasTiketModel extends Model
{
  protected $builder;
  protected $table = 'kelas_tiket';

  public function __construct()
  {
    $db = \Config\Database::connect();
    $this->builder = $db->table('kelas_tiket');
  }

  public function getKelasTiket(){
    $this->builder->select('*');
    $query = $this->builder->get();
    return $query->getResult();
  }
}
