<?php

namespace App\Models;

use App\Models\Enums\EstadoAlojamiento;
use App\Models\Enums\TipoAlojamiento;
use CodeIgniter\Model;

class Alojamiento extends Model {
	protected $table = 'alojamiento';
	protected $primaryKey = 'idAlojamiento';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ['tipoAlojamiento', 'precioDia', 'cantidadPersonas', 'estadoAlojamiento', 'proveedor_id'];

	protected $validationRules = [
		'tipoAlojamiento' => 'required|in_list[' . TipoAlojamiento::UNICA . ',' . TipoAlojamiento::HABITACION . ',' . TipoAlojamiento::COMPARTIDA . ']',
		'precioDia' => 'required|numeric',
		'capacidadPersonas' => 'required|integer',
		'estadoAlojamiento' => 'required|in_list[' . EstadoAlojamiento::INACTIVO . ',' . EstadoAlojamiento::ACTIVO . ']',
	];

	protected $validationMessages = [
		'tipoAlojamiento' => [
			'in_list' => 'El tipo de alojamiento seleccionado no es válido.',
		],
		'precioDia' => [
			'numeric' => 'El precio por día debe ser numérico.',
		],
		'cantidadPersonas' => [
			'integer' => 'La capacidad de personas debe ser un número entero.',
		],
		'estadoAlojamiento' => [
			'in_list' => 'El estado del alojamiento seleccionado no es válido.',
		],
	];

	protected $belongsTo = [
		'proveedor' => [
			'model' => 'Proveedor',
			'foreign_key' => 'proveedor_id',
		],
		'preciosemana' => [
			'model' => 'PreciosSemana',
			'foreign_key' => 'idPrecioSemanaFk',
		],
	];
}
