<?php

namespace App\Controllers;

use App\Models\Direccion;
use CodeIgniter\RESTful\ResourceController;

use CodeIgniter\API\ResponseTrait;

class DireccionController extends BaseController
{   
    use ResponseTrait;   

    protected $modelName = 'App\Models\Direccion';
    protected $format    = 'json';
    private $model;
    public function __construct()
    {
        $this->model = new Direccion();
    }
  
    // GET /direccion
    public function index()
    {
        $direcciones = $this->model->findAll();
        return view('direccion/index', ['direcciones' => $direcciones]);
    }

    // GET /direccion/$id
    public function show($id = null)   {        
      
        if($id != null){ 
            $direccion = $this->model->find($id);            
            if(!$direccion){
                return view('direccion/index', ['error' => 'No se encontró una dirección con ID ' . $id]);
            }else{                
                return view('direccion/form', ['direccion' => $direccion]);
            }
        }else{
            return view('direccion/form' ); 
        }       
    }

    // POST /direccion
    public function create()
    {
        $data = [
            'latitud' => $this->request->getPost('latitud'),
            'longitud' => $this->request->getPost('longitud'),
            'dir' => $this->request->getPost('dir'),
            'ciudad' => $this->request->getPost('ciudad'),
            'pais' => $this->request->getPost('pais')
        ];

        if (!$this->model->save($data)) {
            return view('direccion/index', [$this->fail($this->model->errors())]);
        }
        return redirect()->to('/direccion')->with('message', 'Dirección creada');

        //return $this->respondCreated($data, 'Dirección creada');
    }

    // PUT /direccion/$id
    public function update($id = null)
    {
        $data = $this->request->getRawInput() + ['id' => $id];

        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        return $this->respondUpdated($data, 'Dirección actualizada');
    }

    // DELETE /direccion/$id
    public function delete($id = null)
    {
        if ($id == null || $this->model->delete($id)) {
            return redirect()->to('/direccion')->with('message', 'Dirección eliminada');
        } else {
            return $this->failNotFound('No se encontró una dirección con ID ' . $id);
        }
    }
}
