<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableServiciosAlojamiento extends Migration {
	public function up() {
		$this->forge->addField([
			'idServicioFk' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'idAlojamientoFk' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
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

		$this->forge->addForeignKey('idAlojamientoFk', 'alojamiento', 'idAlojamiento');
		$this->forge->addForeignKey('idServicioFk', 'servicios', 'idServicio');

		$this->forge->addPrimaryKey(['idServicioFk', 'idAlojamientoFk']);
		$this->forge->createTable('serviciosAlojamiento');
	}

	public function down() {

		$this->forge->dropForeignKey('serviciosAlojamiento', 'serviciosAlojamiento_idServicioFk_foreign');
		// $this->forge->dropForeignKey('serviciosAlojamiento', 'serviciosAlojamiento_idAlojamientoFk_foreign');
		$this->forge->dropTable('serviciosAlojamiento');
	}
}
