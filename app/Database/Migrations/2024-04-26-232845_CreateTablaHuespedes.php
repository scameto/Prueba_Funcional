<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablaHuespedes extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'nick' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'unique' => true,
				'null' => false,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'unique' => true,
				'null' => false,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'min_length' => 8,
				'null' => false,
			],
			'telefono' => [
				'type' => 'NUMERIC',
				'constraint' => 20,
				'null' => false,
			],
			'nombre' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => false,
			],
			'apellido' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => false,
			],
			'imagen' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => false,
			],
			'cedula' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => false,
				'unique' => true,
			],
			'promociones' => [
				'type' => 'BOOLEAN',
				'null' => false,
			],
			'puntos' => [
				'type' => 'INT',
				'constraint' => 128,
				'null' => false,
			],
			'codigo_referido' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => false,
				'unique' => true,
			],
			'idDireccionFk' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
		]);

		$this->forge->addForeignKey('idDireccionFk', 'direccion', 'id');
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('huespedes');
	}

	public function down() {
		$this->forge->dropForeignKey('huespedes', 'huespedes_idDireccionFk_foreign');
		$this->forge->dropTable('huespedes');
	}
}
