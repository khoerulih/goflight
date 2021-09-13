<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Maskapai extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'maskapai_id' 		 => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nama_maskapai'    => ['type' => 'varchar', 'constraint' => 255],
			'maskapai_logo'    => ['type' => 'varchar', 'constraint' => 255]
		]);

		$this->forge->addKey('maskapai_id', true);
		$this->forge->createTable('maskapai');
	}

	public function down()
	{
		$this->forge->dropTable('maskapai', true);
	}
}
