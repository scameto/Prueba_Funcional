<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AlojamientoController extends BaseController {
	public function index() {
		$data = [
			'title' => 'Alojamientos',
		];
		return view('alojamiento/index', $data);
	}
	public function showCreate() {
		$data = [
			'title' => 'Crear Alojamiento',
		];
		return view('alojamiento/showCreate', $data);
	}
	public function create() {
		var_dump($this->request->getPost());
	}
}
