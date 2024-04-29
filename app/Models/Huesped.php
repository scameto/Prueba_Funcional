<?php

namespace App\Models;

use CodeIgniter\Model;

class Huesped extends Usuario
{
    protected $table            = 'huespedes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['nick', 'email', 'password', 'telefono', 'nombre', 'apellido', 'imagen', 'cedula', 'promociones', 'puntos', 'codigo_referido'];

    protected $validationRules = [
        'telefono' => 'required|numeric',
        'nombre' => 'required',
        'apellido' => 'required',
        'imagen' => 'required',
        'cedula' => 'required|is_unique[huespedes.cedula]',
        'promociones' => 'required|boolean',
        'puntos' => 'required|integer',
        'codigo_referido' => 'required|is_unique[huespedes.codigo_referido]'
    ];

    protected $validationMessages = [
        'telefono' => [
            'numeric' => 'El teléfono debe ser un valor numérico.'
        ],
        'cedula' => [
            'is_unique' => 'La cédula ya está en uso.'
        ],
        'codigo_referido' => [
            'is_unique' => 'El código de referido ya está en uso.'
        ]
    ];
}
