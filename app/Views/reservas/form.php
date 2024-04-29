<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .form-container form {
        width: 100%; /* O el ancho que desees */
        max-width: 500px; /* O el ancho máximo que desees */
        margin: auto;
    }

    .form-container label,
    .form-container input,
    .form-container select,
    .form-container button {
        display: block;
        width: 100%;
        margin-bottom: 10px; /* Espaciado entre los elementos del formulario */
    }

    /* Estilos específicos para el calendario para que no sea demasiado ancho */
    #calendarContainer {
        max-width: 500px;
        margin-bottom: 20px;
    }
</style>

<div class="form-container">
    <h1><?=isset($reserva['id']) ? 'Editar Reserva' : 'Crear Nueva Reserva';?></h1>
    <form method="post" action="<?=isset($reserva['id']) ? base_url('reservas/' . $reserva['id']) : base_url('reservas');?>">
        <input type="hidden" name="_method" value="<?=isset($reserva['id']) ? 'PUT' : 'POST'?>">


        <div id="calendarContainer"></div><br><br>
        <input class= "invisible hidden" style="display:none" type="text" name="checkin" id="checkin" hidden>
        <input class= "invisible hidden" style="display:none" type="text" name="checkout" id="checkout" hidden>


        <!-- <label for="checkin">Check-in:</label>

        <input type="date" name="checkin" id="checkin" value="<?=isset($reserva['checkin']) ? $reserva['checkin'] : ''?>" required>

        <label for="checkout">Check-out:</label>
        <input type="date" name="checkout" id="checkout" value="<?=isset($reserva['checkout']) ? $reserva['checkout'] : ''?>" required> -->

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

        <label for="alojamiento_id">Alojamiento:</label>
        <select name="alojamiento_id" id="alojamiento_id" required>
            <?php foreach ($alojamientos as $alojamiento): ?>
            <option value="<?= $alojamiento['idAlojamiento']; ?>" <?= isset($reserva['alojamiento_id']) && $reserva['alojamiento_id'] == $alojamiento['idAlojamiento'] ? 'selected' : ''; ?>>
                <?= $alojamiento['nombre']; ?>
            </option>
            <?php endforeach; ?>
        </select> 

        <label for="huesped_id">Huésped:</label>
        <select name="huesped_id" id="huesped_id" required>
            <?php foreach ($huespedes as $huesped): ?>
            <option value="<?= $huesped['id'] ?>" <?= isset($reserva['huesped_id']) && $reserva['huesped_id'] == $huesped['id'] ? 'selected' : ''; ?>>
                <?= $huesped['nombre'] ?>
            </option>
            <?php endforeach; ?>
        </select>

        <button type="submit"><?=isset($reserva['id']) ? 'Actualizar' : 'Crear';?></button>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var fechasReservadas = <?= json_encode($fechasReservadas); ?>;
        
    var calendar = flatpickr("#calendarContainer", {
        inline: true, // this makes the calendar always visible
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
        disable: fechasReservadas.map(function(rango) {
            return {
                from: rango.from,
                 to: rango.to
             };
         }),
        onChange: function(selectedDates) {
            // Cuando se selecciona un rango, se actualizan los campos ocultos
            var _checkin = document.getElementById("checkin");
            var _checkout = document.getElementById("checkout");
            
            _checkin.value = selectedDates[0] ? selectedDates[0].toISOString().slice(0, 10) : "";
            _checkout.value = selectedDates[1] ? selectedDates[1].toISOString().slice(0, 10) : "";
        }
    });
});
</script>




