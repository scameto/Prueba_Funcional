<?php

namespace App\Controllers;

use App\Models\Enums\EstadoPago;
use App\Models\Reservas;
use CodeIgniter\API\ResponseTrait;

class ReservasController extends BaseController {
	use ResponseTrait;

	protected $modelName = 'App\Models\Reservas';
	protected $format = 'json';
	private $model;
	public function __construct() {
		$this->model = new Reservas();
	}

	public function index() {
		$reservas = $this->model->findAll();
		return view('reservas/index', ['reservas' => $reservas]);
	}

	public function show($id = null) {
		//$alojamientos = new Alojamientos();
		//$huespedes = new Huespedes();
		//$alojamientos_datos = $alojamientos->findAll();
		//$huespedes_datos = $huespedes->findAll();
		if ($id != null) {
			$reserva = $this->model->find($id);
			if (!$reserva) {
				return view('reservas/index', ['error' => 'No se encontró una reserva con ID ' . $id]);
			} else {
				return view('reservas/form', ['reserva' => $reserva,
					//, 'alojamientos' => $alojamientos_datos, 'huespedes' => $huespedes_datos
				]);
			}
		} else {
			return view('reservas/form');
		}
	}

	public function create() {

		$estadoPagoInput = $this->request->getPost('estadoPago');

		$estadoPago = match ($estadoPagoInput) {
			'pendiente' => EstadoPago::PAGO_PENDIENTE,
			'pagado' => EstadoPago::PAGADO,
			'cancelado' => EstadoPago::CANCELADO,
			default => null,
		};

		if ($estadoPago === null) {
			return redirect()->to('/reservas')->with('message', 'Estado de pago inválido');
		}

		$data = [
			'checkin' => $this->request->getPost('checkin'),
			'checkout' => $this->request->getPost('checkout'),
			'cantPersonas' => $this->request->getPost('cantPersonas'),
			'precioTotal' => $this->request->getPost('precioTotal'),
			'estadoPago' => $estadoPago,
			'alojamiento_id' => 1,
			'huesped_id' => 1,
		];

		if (!$this->model->save($data)) {
			$errors = implode('<br>', $this->model->errors());
			return redirect()->to('/reservas')->with('message', $errors);
		}
		return redirect()->to('/reservas')->with('message', 'Reserva creada');
	}

	public function update($id = null) {
		$data = $this->request->getRawInput() + ['id' => $id];
		if (!$this->model->save($data)) {
			return $this->fail($this->model->errors());
		}
		return $this->respondUpdated($data, 'Reserva actualizada');
	}

	public function delete($id = null) {
		if ($id == null || $this->model->delete($id)) {
			return redirect()->to('/reservas')->with('message', 'Dirección eliminada');
		} else {
			return $this->failNotFound('No se encontró una dirección con ID ' . $id);
		}
	}
}
