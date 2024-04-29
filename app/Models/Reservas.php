<?php

namespace App\Models;


use App\Models\Enums\EstadoPago;
use CodeIgniter\Model;

class Reservas extends Model{
    protected $table            = 'reservas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['checkin', 'checkout', 'cantPersonas', 'precioTotal', 'estadoPago', 'alojamiento_id', 'huesped_id'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    protected $validationRules = [
        'checkin' => 'required|valid_date',
        'checkout' => 'required|valid_date',
        'cantPersonas' => 'required|integer',
        'precioTotal' => 'required|numeric',
        'estadoPago' => 'required|in_list[' . EstadoPago::PAGO_PENDIENTE . ',' . EstadoPago::PAGADO . ',' . EstadoPago::CANCELADO . ']'
    ];
    
    protected $validationMessages = [
        'checkin' => [
            'valid_date' => 'El formato de la fecha de check-in no es válido.'
        ],
        'checkout' => [
            'valid_date' => 'El formato de la fecha de check-out no es válido.'
         
        ],
        'estadoPago' => [
            'in_list' => 'El estado de pago seleccionado no es válido.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function obtenerReservasDesde($fecha){
        $builder = $this->db->table($this->table);
        $builder->select('checkin, checkout');
        $builder->where('checkout >=', $fecha && 'deleted_at' == null);

        $query = $builder->get();
        return $query->getResultArray();
        
    }

// Pasar las fechas al frontend para usarlas en JavaScript
 


    
/*
COMENTE ESTE CACHO DE CODIGO YA Q LO MANEJO EN LA BASE DE DATOS
    protected $belongsTo = [
        'alojamiento' => [
            'model' => 'Alojamiento',
            'foreign_key' => 'alojamiento_id'
        ],
        'huesped' => [
            'model' => 'Huesped',
            'foreign_key' => 'huesped_id'
        ]
    ];
*/
}



