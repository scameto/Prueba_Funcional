<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableServicios extends Migration {
	public function up() {
		$this->forge->addField([
			'idServicio' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'nombre' => [
				'type' => 'VARCHAR',
				'constraint' => 40,
			],
			'desc' => [
				'type' => 'VARCHAR',
				'constraint' => 200,
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true,
			],
		]);

		$this->forge->addKey('idServicio', true);
		$this->forge->createTable('servicios');
	}

	public function down() {
		$this->forge->dropTable('servicios');
	}
}
