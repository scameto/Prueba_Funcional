<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableConfiguracionPrecios extends Migration {
	public function up() {
		$this->forge->addField([
			'idConfigPrecios' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'nombre' => [
				'type' => 'VARCHAR',
				'constraint' => 40,
			],
			'fechaInicio' => [
				'type' => 'DATETIME',
			],
			'fechaFin' => [
				'type' => 'DATETIME',
			],
			'multiplicador' => [
				'type' => 'INT',
				'constraint' => 3,
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
			'idAlojamientoFk' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
		]);

		$this->forge->addForeignKey('idAlojamientoFk', 'alojamiento', 'idAlojamiento');
		$this->forge->addKey('idConfigPrecios', true);
		$this->forge->createTable('configuracionPrecios');
	}

	public function down() {
		$this->forge->dropForeignKey('configuracionPrecios', 'configuracionPrecios_idAlojamientoFk_foreign');
		$this->forge->dropTable('configuracionPrecios');
	}
}
