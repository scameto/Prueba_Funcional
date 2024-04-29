<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDireccionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'latitud' => [
                'type' => 'DECIMAL',
                'constraint' => '10,8',
                'null' => false,
            ],
            'longitud' => [
                'type' => 'DECIMAL',
                'constraint' => '11,8',
                'null' => false,
            ],
            'dir' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'ciudad' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'pais' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->createTable('direccion');
    }

    public function down()
    {
        $this->forge->dropTable('direccion');
    }
}
