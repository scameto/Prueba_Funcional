<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Opiniones;
use CodeIgniter\HTTP\ResponseInterface;

class OpinionesController extends BaseController
{
    protected $modelName = 'App\Models\Opiniones';
	protected $format = 'json';
	private $model;
	public function __construct() {
		$this->model = new Opiniones();
	}

    public function index()
    {
        return view('opiniones/Opiniones');
    }

    public function createOpiniones(){
        $data = [
			'opinionAlojamiento' => $this->request->getPost('opinionAlojamiento'),
			'puntuacionAlojamiento' => $this->request->getPost('puntuacionAlojamiento'),
			'opinionEmpresa' => $this->request->getPost('opinionEmpresa'),
			'puntuacionEmpresa' => $this->request->getPost('puntuacionEmpresa'),
            'reserva_id' => 1
		];

        if (!$this->model->save($data)) {
			$errors = implode('<br>', $this->model->errors());
			return redirect()->to('/opiniones')->with('message', $errors);
		}
		return redirect()->to('/opiniones')->with('message', 'Opinion creada');
    }
}
