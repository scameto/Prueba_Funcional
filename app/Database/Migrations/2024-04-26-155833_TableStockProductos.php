<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableStockProductos extends Migration {
	public function up() {
		$this->forge->addField([
			'idStockProductos' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'toallas' => [
				'type' => 'INT',
				'constraint' => 5,
			],
			'shampoo' => [
				'type' => 'INT',
				'constraint' => 5,
			],
			'jabon' => [
				'type' => 'INT',
				'constraint' => 5,
			],
			'ropaDeCama' => [
				'type' => 'INT',
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
			'idAlojamientoFk' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
		]);

		$this->forge->addForeignKey('idAlojamientoFk', 'alojamiento', 'idAlojamiento');
		$this->forge->addKey('idStockProductos', true);
		$this->forge->createTable('stockProductos');

	}

	public function down() {
		$this->forge->dropForeignKey('stockProductos', 'stockProductos_idAlojamientoFk_foreign');
		$this->forge->dropTable('stockProductos');
	}
}
