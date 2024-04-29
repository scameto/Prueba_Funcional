<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignToServicios extends Migration {
	public function up() {
		$this->forge->addColumn('servicios', [
			'COLUMN serviciosAlojamientoFk INT(11) UNSIGNED',
			'CONSTRAINT servicios_serviciosAlojamientoFk_foreign FOREIGN KEY(serviciosAlojamientoFk)
            REFERENCES serviciosAlojamiento(idServicioFk)',
		]);
	}

	public function down() {
		$this->forge->dropForeignKey('servicios', 'servicios_serviciosAlojamientoFk_foreign');
		$this->forge->dropColumn('servicios', 'serviciosAlojamientoFk');
	}
}
