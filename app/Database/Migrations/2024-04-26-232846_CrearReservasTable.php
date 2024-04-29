<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CrearReservasTable extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'checkin' => [
				'type' => 'DATE',
				'null' => false,
			],
			'checkout' => [
				'type' => 'DATE',
				'null' => false,
			],
			'cantPersonas' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
			],
			'precioTotal' => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
				'null' => false,
			],
			'estadoPago' => [
				'type' => 'ENUM',
				'constraint' => ['PAGO_PENDIENTE', 'PAGADO', 'CANCELADO'],
				'default' => 'PAGO_PENDIENTE',
				'null' => false,
			],
			'alojamiento_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
			],
			'huesped_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp',
			'deleted_at' => [
				'type' => 'datetime',
				'null' => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('alojamiento_id', 'alojamiento', 'idAlojamiento', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('huesped_id', 'huespedes', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('reservas');
	}

	public function down() {
		$this->forge->dropForeignKey('reservas', 'reservas_alojamiento_id_foreign');
		$this->forge->dropForeignKey('reservas', 'reservas_huesped_id_foreign');
		$this->forge->dropTable('reservas', true);
	}
}