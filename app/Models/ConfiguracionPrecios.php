<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionPrecios extends Model
{
    protected $table            = 'configuracionprecios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre', 'fechaInicio', 'fechaFin', 'multiplicador', 'alojamiento_id'];

    protected $belongsTo = [
        'alojamiento' => [
            'model' => 'Alojamiento',
            'foreign_key' => 'alojamiento_id'
        ]
    ];
}
