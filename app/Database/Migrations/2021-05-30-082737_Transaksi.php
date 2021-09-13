<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
		/*
		*	Tabel Status Transaksi
		*/
		$this->forge->addField([
			'status_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nama_status' => ['type' => 'varchar', 'constraint' => 255],
		]);

		$this->forge->addKey('status_id', true);
		$this->forge->createTable('status_transaksi');


		/*
		*	Tabel Tipe Pembayaran
		*/

		$this->forge->addField([
			'tipe_pembayaran_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nama_pembayaran' => ['type' => 'varchar', 'constraint' => 255],
		]);

		$this->forge->addKey('tipe_pembayaran_id', true);
		$this->forge->createTable('tipe_pembayaran');
		
		/*
		*	Tabel Transaksi
		*/

		$this->forge->addField([
			'transaksi_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'user_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'tiket_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'tipe_pembayaran_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'status_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
			'jumlah_tiket' => ['type' => 'int'],
			'total_harga' => ['type' => 'int'],
			'tanggal_transaksi' => ['type' => 'datetime'],
			'nama_admin' => ['type' => 'varchar', 'constraint' => 255],
		]);

		$this->forge->addKey('transaksi_id', true);
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('tiket_id', 'tiket', 'tiket_id');
		$this->forge->addForeignKey('tipe_pembayaran_id', 'tipe_pembayaran', 'tipe_pembayaran_id');
		$this->forge->addForeignKey('status_id', 'status_transaksi', 'status_id');
		$this->forge->createTable('transaksi');

	}

	public function down()
	{
		$this->forge->dropTable('status_transaksi', true);
		$this->forge->dropTable('tipe_pembayaran', true);
		$this->forge->dropTable('transaksi', true);
	}
}
