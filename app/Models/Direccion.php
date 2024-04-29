<?php

namespace App\Models;

use CodeIgniter\Model;

class Direccion extends Model
{
    protected $table            = 'direccion';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['latitud', 'longitud', 'dir', 'ciudad', 'pais'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'latitud' => 'required|numeric',
        'longitud' => 'required|numeric',
        'dir' => 'required|string',
        'ciudad' => 'required|string',
        'pais' => 'required|string'
    ];
    
    protected $validationMessages   = [
        'latitud' => [
            'required' => 'La latitud es requerida.',
            'numeric' => 'La latitud debe ser un número.'
        ],
        'longitud' => [
            'required' => 'La longitud es requerida.',
            'numeric' => 'La longitud debe ser un número.'
        ],
        'dir' => [
            'required' => 'La descripción es requerida.',
            'string' => 'La descripción debe ser un texto.'
        ],
        'ciudad' => [
            'required' => 'La ciudad es requerida.',
            'string' => 'La ciudad debe ser un texto.'
        ],
        'pais' => [
            'required' => 'El país es requerido.',
            'string' => 'El país debe ser un texto.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

 
  /*  // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    */
}
