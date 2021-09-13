<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'users';
  protected $useTimestamps = true;
  protected $builder;
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('users');
  }

  public function getAllUser() {
    $this->builder->select('*');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->where('group_id', 2);
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function getUser($id) {
    $this->builder->select('*');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->where('id', $id);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }

  public function getAllAdmin() {
    $this->builder->select('*');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->where('group_id', 1);
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function countUser(){
    $this->builder->selectCount('id');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->where('group_id', 2);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }

  public function deleteUser($id) {
    $this->builder->where('id', $id);
    $this->builder->delete();
  }
}
