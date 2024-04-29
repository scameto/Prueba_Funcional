<h1><?=isset($reserva['id']) ? 'Editar Reserva' : 'Crear Nueva Reserva';?></h1>
<form method="post" action="<?=isset($reserva['id']) ? base_url('reservas/' . $reserva['id']) : base_url('reservas');?>">
    <input type="hidden" name="_method" value="<?=isset($reserva['id']) ? 'PUT' : 'POST'?>">
    <label for="checkin">Check-in:</label>

    <input type="date" name="checkin" id="checkin" value="<?=isset($reserva['checkin']) ? $reserva['checkin'] : ''?>" required>

    <label for="checkout">Check-out:</label>
    <input type="date" name="checkout" id="checkout" value="<?=isset($reserva['checkout']) ? $reserva['checkout'] : ''?>" required>

    <label for="cantPersonas">Cantidad de Personas:</label>
    <input type="number" name="cantPersonas" id="cantPersonas" value="<?=isset($reserva['cantPersonas']) ? $reserva['cantPersonas'] : ''?>" required>

    <label for="precioTotal">Precio Total:</label>
    <input type="text" name="precioTotal" id="precioTotal" value="<?=isset($reserva['precioTotal']) ? $reserva['precioTotal'] : ''?>" required>

    <label for="estadoPago">Estado del Pago:</label>
    <select name="estadoPago" id="estadoPago" required>
        <option value="pendiente" <?=isset($reserva['estadoPago']) && $reserva['estadoPago'] == 'pendiente' ? 'selected' : '';?>>Pendiente</option>
        <option value="pagado" <?=isset($reserva['estadoPago']) && $reserva['estadoPago'] == 'pagado' ? 'selected' : '';?>>Pagado</option>
        <option value="cancelado" <?=isset($reserva['estadoPago']) && $reserva['estadoPago'] == 'cancelado' ? 'selected' : '';?>>Cancelado</option>
    </select>

    <button type="submit"><?=isset($reserva['id']) ? 'Actualizar' : 'Crear';?></button>
</form>
