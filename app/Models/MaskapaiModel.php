<?php

namespace App\Models;

use CodeIgniter\Model;

class MaskapaiModel extends Model
{
  protected $table = 'maskapai';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama_maskapai', 'maskapai_logo'];

  public function getAllMaskapai() {
    $db      = \Config\Database::connect();
    $builder = $db->table('maskapai');
    $builder->select('*');
    $query = $builder->get();
    return $query->getResult();
  }

  public function getMaskapai($id){
    $db      = \Config\Database::connect();
    $builder = $db->table('maskapai');
    $builder->select('*');
    $builder->where('maskapai_id', $id);
    $query = $builder->get();
    return $query->getFirstRow();
  }

  public function deleteMaskapai($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('maskapai');
    $builder->where('maskapai_id', $id);
    $builder->delete();
  }
}
