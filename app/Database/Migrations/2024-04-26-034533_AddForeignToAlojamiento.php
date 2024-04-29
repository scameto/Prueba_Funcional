<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignToAlojamiento extends Migration {
	public function up() {
		$this->forge->addColumn('alojamiento', [
			'COLUMN serviciosAlojamientoFk INT(11) UNSIGNED',
			'CONSTRAINT alojamiento_serviciosAlojamientoFk_foreign FOREIGN KEY(serviciosAlojamientoFk)
            REFERENCES serviciosAlojamiento(idAlojamientoFk)',
		]);
	}

	public function down() {
		$this->forge->dropForeignKey('alojamiento', 'alojamiento_serviciosAlojamientoFk_foreign');
		$this->forge->dropColumn('alojamiento', 'serviciosAlojamientoFk');
	}
}
