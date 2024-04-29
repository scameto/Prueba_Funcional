<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nick', 'email', 'password'];

    protected $validationRules = [
        'nick' => 'required|alpha_numeric|max_length[50]|is_unique[usuarios.nick]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'password' => 'required|min_length[8]'
    ];

    protected $validationMessages = [
        'nick' => [
            'is_unique' => 'El nick ya está en uso.'
        ],
        'email' => [
            'is_unique' => 'El email ya está en uso.'
        ]
    ];
}
