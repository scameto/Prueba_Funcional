<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableOpiniones extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'opinionAlojamiento' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'puntuacionAlojamiento' => [
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => true,
			],
			'opinionEmpresa' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'puntuacionEmpresa' => [
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => true,
			],
			'reserva_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('reserva_id', 'reservas', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('opiniones');
	}

	public function down() {
		$this->forge->dropForeignKey('opiniones', 'opiniones_reserva_id_foreign');
		$this->forge->dropTable('opiniones');
	}
}
