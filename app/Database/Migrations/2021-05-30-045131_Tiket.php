<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tiket extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kelas_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'kelas'    => ['type' => 'varchar', 'constraint' => 255],
		]);

		$this->forge->addKey('kelas_id', true);
		$this->forge->createTable('kelas_tiket');

		// Tabel Tiket

		$this->forge->addField([
			'tiket_id' 		 					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'kelas_id' 							=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'maskapai_id'  					=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'nama_maskapai'    			=> ['type' => 'varchar', 'constraint' => 255],
			'asal'    							=> ['type' => 'varchar', 'constraint' => 255],
			'tujuan'    						=> ['type' => 'varchar', 'constraint' => 255],
			'harga_tiket'    				=> ['type' => 'int'],
			'tanggal_keberangkatan' => ['type' => 'date'],
			'jam_keberangkatan'     => ['type' => 'time'],
		]);

		$this->forge->addKey('tiket_id', true);
		$this->forge->addForeignKey('kelas_id', 'kelas_tiket', 'kelas_id');
    $this->forge->addForeignKey('maskapai_id', 'maskapai', 'maskapai_id');
		$this->forge->createTable('tiket');
	}

	public function down()
	{
		$this->forge->dropTable('kelas_tiket', true);
		$this->forge->dropTable('tiket', true);
	}
}
