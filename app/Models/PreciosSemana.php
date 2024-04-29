<?php

namespace App\Models;

use CodeIgniter\Model;

class PreciosSemana extends Model {
	protected $table = 'precioSemana';
	protected $primaryKey = 'idPrecioSemana';
	protected $useAutoIncrement = true;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ['lunesJueves', 'viernesDomingo'];

	protected $validationRules = [
		'lunesJueves' => 'required|numeric',
		'viernesDomingo' => 'required|numeric',
	];

	protected $validationMessages = [
		'lunesJueves' => [
			'numeric' => 'El valor para lunes a jueves debe ser numérico.',
		],
		'viernesDomingo' => [
			'numeric' => 'El valor para viernes a domingo debe ser numérico.',
		],
	];
}
