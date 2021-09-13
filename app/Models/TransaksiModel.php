<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
  protected $builder;
  protected $db;
  protected $table = 'transaksi';
  protected $useTimestamps = true;
  protected $allowedFields = ['user_id', 'tiket_id', 'tipe_pembayaran_id', 'status_id', 'jumlah_tiket', 'total_harga', 'tanggal_transaksi', 'nama_admin'];

  public function __construct()
  {
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('transaksi');
  }

  public function getAllTransaksiUser() {
    $this->builder->select('*');
    $this->builder->join('users', 'users.id = transaksi.user_id');
    $this->builder->join('tiket', 'tiket.tiket_id = transaksi.tiket_id');
    $this->builder->join('tipe_pembayaran', 'tipe_pembayaran.tipe_pembayaran_id = transaksi.tipe_pembayaran_id');
    $this->builder->join('status_transaksi', 'status_transaksi.status_id = transaksi.status_id');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $this->builder->where('user_id', user_id());
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function getPendingTransaksi() {
    $this->builder->select('*');
    $this->builder->join('users', 'users.id = transaksi.user_id');
    $this->builder->join('tiket', 'tiket.tiket_id = transaksi.tiket_id');
    $this->builder->join('tipe_pembayaran', 'tipe_pembayaran.tipe_pembayaran_id = transaksi.tipe_pembayaran_id');
    $this->builder->join('status_transaksi', 'status_transaksi.status_id = transaksi.status_id');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $this->builder->where('transaksi.status_id', 1);
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function getAllTransaksi() {
    $this->builder->select('*');
    $this->builder->join('users', 'users.id = transaksi.user_id');
    $this->builder->join('tiket', 'tiket.tiket_id = transaksi.tiket_id');
    $this->builder->join('tipe_pembayaran', 'tipe_pembayaran.tipe_pembayaran_id = transaksi.tipe_pembayaran_id');
    $this->builder->join('status_transaksi', 'status_transaksi.status_id = transaksi.status_id');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function getSuccessTransactionUser() {
    $this->builder->select('*');
    $this->builder->join('users', 'users.id = transaksi.user_id');
    $this->builder->join('tiket', 'tiket.tiket_id = transaksi.tiket_id');
    $this->builder->join('tipe_pembayaran', 'tipe_pembayaran.tipe_pembayaran_id = transaksi.tipe_pembayaran_id');
    $this->builder->join('status_transaksi', 'status_transaksi.status_id = transaksi.status_id');
    $this->builder->join('maskapai', 'maskapai.maskapai_id = tiket.maskapai_id');
    $this->builder->join('kelas_tiket', 'kelas_tiket.kelas_id = tiket.kelas_id');
    $this->builder->where('transaksi.status_id', 2);
    $this->builder->where('id', user_id());
    $query = $this->builder->get();
    return $query->getResult();
  }

  public function getTransaksi($id){
    $this->builder->select('*');
    $this->builder->join('users', 'users.id = transaksi.user_id');
    $this->builder->join('tiket', 'tiket.tiket_id = transaksi.tiket_id');
    $this->builder->join('tipe_pembayaran', 'tipe_pembayaran.tipe_pembayaran_id = transaksi.tipe_pembayaran_id');
    $this->builder->join('status_transaksi', 'status_transaksi.status_id = transaksi.status_id');
    $this->builder->where('transaksi_id', $id);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }

  public function countSuccessTransaction(){
    $this->builder->selectCount('transaksi_id');
    $this->builder->where('transaksi.status_id', 2);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }

  public function countPendingTransaction(){
    $this->builder->selectCount('transaksi_id');
    $this->builder->where('transaksi.status_id', 1);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }

  public function sumAllProfit() {
    $this->builder->selectSum('total_harga');
    $this->builder->where('transaksi.status_id', 2);
    $query = $this->builder->get();
    return $query->getFirstRow();
  }
}
