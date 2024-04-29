<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablePrecioSemana extends Migration {
	public function up() {
		$this->forge->addField([
			'idPrecioSemana' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'lunesJueves' => [
				'type' => 'DECIMAL',
				'constraint' => 5,
			],
			'viernesDomingo' => [
				'type' => 'DECIMAL',
				'constraint' => 5,
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

		$this->forge->addKey('idPrecioSemana', true);
		$this->forge->createTable('precioSemana');
	}

	public function down() {
		$this->forge->dropTable('precioSemana');
	}
}
