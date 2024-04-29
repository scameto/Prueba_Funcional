<?php

namespace App\Models;

use CodeIgniter\Model;

class Opiniones extends Model
{
    protected $table            = 'opiniones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'opinionAlojamiento', 'puntuacionAlojamiento', 'opinionEmpresa', 'puntuacionEmpresa', 'reserva_id'];

    protected $validationRules = [
        'opinionAlojamiento' => 'required|string|max_length[255]',
        'opinionEmpresa' => 'required|string|max_length[255]',
        'puntuacionAlojamiento' => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]',
        'puntuacionEmpresa' => 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[5]'
    ];
    
    protected $validationMessages = [
        'opinionAlojamiento' => [
            'required' => 'La opinión del alojamiento es obligatoria.',
            'string' => 'La opinión del alojamiento debe ser un texto válido.',
            'max_length' => 'La opinión del alojamiento no puede tener más de 255 caracteres.'
        ],
        'opinionEmpresa' => [
            'required' => 'La opinión de la empresa es obligatoria.',
            'string' => 'La opinión de la empresa debe ser un texto válido.',
            'max_length' => 'La opinión de la empresa no puede tener más de 255 caracteres.'
        ],
        'puntuacionAlojamiento' => [
            'required' => 'La puntuación del alojamiento es obligatoria.',
            'numeric' => 'La puntuación del alojamiento debe ser un valor numérico.',
            'greater_than_equal_to' => 'La puntuación del alojamiento debe ser igual o mayor que 1.',
            'less_than_equal_to' => 'La puntuación del alojamiento debe ser igual o menor que 5.'
        ],
        'puntuacionEmpresa' => [
            'required' => 'La puntuación de la empresa es obligatoria.',
            'numeric' => 'La puntuación de la empresa debe ser un valor numérico.',
            'greater_than_equal_to' => 'La puntuación de la empresa debe ser igual o mayor que 1.',
            'less_than_equal_to' => 'La puntuación de la empresa debe ser igual o menor que 5.'
        ]
    ];

    protected $belongsTo = [
        'reserva' => [
            'model' => 'Reservas',
            'foreign_key' => 'reserva_id'
        ]
    ];
    
}
