<?php

namespace App\Database\Migrations;

use App\Models\Enums\EstadoAlojamiento;
use App\Models\Enums\TipoAlojamiento;
use CodeIgniter\Database\Migration;

class TableAlojamiento extends Migration {
	public function up() {
		$tipos = [
			TipoAlojamiento::HABITACION,
			TipoAlojamiento::COMPARTIDA,
			TipoAlojamiento::UNICA,
		];
		$estados = [
			EstadoAlojamiento::ACTIVO,
			EstadoAlojamiento::INACTIVO,
		];
		$this->forge->addField([
			'idAlojamiento' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'nombre' => [
				'type' => 'VARCHAR',
				'constraint' => 40,
			],
			'tipoAlojamiento' => [
				'type' => "ENUM('" . implode("','", $tipos) . "')",
				'default' => TipoAlojamiento::UNICA,
			],
			'precioDia' => [
				'type' => 'DECIMAL',
				'constraint' => 5,
			],
			'cantidadPersonas' => [
				'type' => 'INT',
				'constraint' => 5,
			],
			'estadoAlojamiento' => [
				'type' => "ENUM('" . implode("','", $estados) . "')",
				'default' => EstadoAlojamiento::ACTIVO,
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

			'idPrecioSemanaFk' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
		]);

		$this->forge->addForeignKey('idPrecioSemanaFk', 'precioSemana', 'idPrecioSemana');

		$this->forge->addKey('idAlojamiento', true);
		$this->forge->createTable('alojamiento');
	}

	public function down() {
		$this->forge->dropForeignKey('alojamiento', 'alojamiento_idPrecioSemanaFk_foreign');
		$this->forge->dropTable('alojamiento');
	}
}
