<?php

namespace App\Controllers;

use App\Database\Migrations\CreateTablaHuespedes;
use App\Models\Alojamiento;
use App\Models\Reservas;
use CodeIgniter\API\ResponseTrait;
use App\Models\Enums\EstadoPago;
use App\Models\Huesped;

class ReservasController extends BaseController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\Reservas';
    protected $format    = 'json';
    private $model;
    public function __construct()
    {
        $this->model = new Reservas();
    }

    public function index()
    {
        $reservas = $this->model->findAll();
        return view('reservas/index', ['reservas' => $reservas]);
    }

    public function show($id = null)
    {
        
        $fechaActual = date('Y-m-d');
        $fechasReservadas = $this->model->obtenerReservasDesde($fechaActual);
   
        $fechasDeshabilitadas = array_map(function ($reserva) {
            return [
                'from' => $reserva['checkin'],
                'to' => $reserva['checkout']
            ];
        }, $fechasReservadas);
        //var_dump($fechasReservadas); // Verificar que las fechas sean correctas (formato, etc.
     
        $alojamientos = new Alojamiento();
        $huespedes = new Huesped();
        $alojamientos_datos = $alojamientos->findAll();
        $huespedes_datos = $huespedes->findAll();
        $data = [
            'fechasReservadas' => $fechasDeshabilitadas, 
            'alojamientos'=>$alojamientos_datos,
            'huespedes'=>$huespedes_datos
        ];



        if($id != null){
            $reserva = $this->model->find($id);
            if(!$reserva){
                return view('reservas/index', ['error' => 'No se encontró una reserva con ID ' . $id]);
            }else{
                $data['reserva'] = $reserva;
            }
        }
        return view('reservas/form', $data );
        
    }

    public function create()    
    {

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

    $checkinTimestamp = strtotime($this->request->getPost('checkin'));
    $checkoutTimestamp = strtotime($this->request->getPost('checkout'));
    $todayTimestamp = strtotime('today midnight' . -1 . 'day');

    // Validar que checkin sea a partir de hoy
    if ($checkinTimestamp < $todayTimestamp) {
        return redirect()->to('/reservas')->with('message', 'La fecha de check-in debe ser a partir de hoy.');
    }

    // Validar que checkout sea posterior a checkin
    if ($checkoutTimestamp <= $checkinTimestamp) {
        return redirect()->to('/reservas')->with('message', 'La fecha de check-out debe ser posterior a la fecha de check-in.');
    }

   
    $data = [
        'checkin' => $this->request->getPost('checkin'),
        'checkout' => $this->request->getPost('checkout'),
        'cantPersonas' => $this->request->getPost('cantPersonas'),
        'precioTotal' => $this->request->getPost('precioTotal'),
        'estadoPago' => $estadoPago,
        'alojamiento_id' => $this->request->getPost('alojamiento_id'),
        'huesped_id' => $this->request->getPost('huesped_id'),  // a futuro session()->get('id'),
    ];
    
      
        if (!$this->model->save($data)) {
            $errors = implode('<br>', $this->model->errors());
            return redirect()->to('/reservas')->with('message', $errors);
        }
        
        return redirect()->to('/reservas')->with('message', 'Reserva creada');

    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();

        $estadoPagoInput = $data['estadoPago'] ?? null;

        $estadoPago = match ($estadoPagoInput) {
            'pendiente' => EstadoPago::PAGO_PENDIENTE,
            'pagado' => EstadoPago::PAGADO,
            'cancelado' => EstadoPago::CANCELADO,
            default => null,
        };
    
        if ($estadoPago === null) {
            
            return redirect()->to('/reservas')->with('message', 'Estado de pago inválido');
        } else {
            $data['estadoPago'] = $estadoPago;
        }
    
        $data += ['id' => $id];

        // Asumiendo que las fechas vienen en el raw input y son válidas
        $checkinTimestamp = strtotime($data['checkin'] ?? null);
        $checkoutTimestamp = strtotime($data['checkout'] ?? null);
        $todayTimestamp = strtotime('today midnight');

        // Validar que checkin sea a partir de hoy
        if ($checkinTimestamp < $todayTimestamp) {
            return redirect()->to('/reservas')->with('message', 'La fecha de check-in debe ser a partir de hoy.');
        }

        // Validar que checkout sea posterior a checkin
        if ($checkoutTimestamp <= $checkinTimestamp) {
            return redirect()->to('/reservas')->with('message', 'La fecha de check-out debe ser posterior a la fecha de check-in.');
        }


        if (!$this->model->save($data)) {
            $errors = implode('<br>', $this->model->errors());
            return redirect()->to('/reservas')->with('message', $errors);
        }
        return redirect()->to('/reservas')->with('message', 'Reserva Actualizada');
    }

    public function delete($id = null)
    {
        if ($id == null || $this->model->delete($id)) {
            return redirect()->to('/reservas')->with('message', 'Dirección eliminada');
        } else {
            return $this->failNotFound('No se encontró una dirección con ID ' . $id);
        }
    }

    /*
    <label for="alojamiento_id">Alojamiento:</label>
    <!-- Asumiendo que $alojamientos es una lista de todos los alojamientos posibles -->
    <select name="alojamiento_id" id="alojamiento_id" required>
        <?php foreach ($alojamientos as $alojamiento): ?>
        <option value="<?= $alojamiento['id'] ?>" <?= isset($reserva['alojamiento_id']) && $reserva['alojamiento_id'] == $alojamiento['id'] ? 'selected' : ''; ?>>
            <?= $alojamiento['nombre'] ?> <!-- o cualquier otro campo que represente al alojamiento -->
        </option>
        <?php endforeach; ?>
    </select>
    
    <label for="huesped_id">Huésped:</label>
    <!-- Asumiendo que $huespedes es una lista de todos los huéspedes posibles -->
    <select name="huesped_id" id="huesped_id" required>
        <?php foreach ($huespedes as $huesped): ?>
        <option value="<?= $huesped['id'] ?>" <?= isset($reserva['huesped_id']) && $reserva['huesped_id'] == $huesped['id'] ? 'selected' : ''; ?>>
            <?= $huesped['nombre'] ?> <!-- o cualquier otro campo que represente al huésped -->
        </option>
        <?php endforeach; ?>
    </select>
    */

}
