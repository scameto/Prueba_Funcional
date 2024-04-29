<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>


<h1>Listado de Reservas</h1>
<a href="<?= base_url('reservas/create') ?>">Crear Nueva Reserva</a>
<table>
    <tr>
        <th>ID</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Cantidad de Personas</th>
        <th>Precio Total</th>
        <th>Estado de Pago</th>
        <!-- <th>Alojamiento ID</th>
        <th>Huésped ID</th> -->
        <th>Acciones</th>
    </tr>
    <?php foreach ($reservas as $res): ?>
    <tr>
        <td><?=$res['id']?></td>
        <td><?=$res['checkin']?></td>
        <td><?=$res['checkout']?></td>
        <td><?=$res['cantPersonas']?></td>
        <td><?=$res['precioTotal']?></td>
        <td><?=$res['estadoPago']?></td>
        <!-- <td><?=$res['alojamiento_id']?></td>
        <td><?=$res['huesped_id']?></td> -->
        <td>
            <a href="<?=base_url('reservas/' . $res['id'])?>">Editar</a>
            <a href="<?=base_url('reservas/delete/' . $res['id'])?>" onclick="return confirm('¿Está seguro de eliminar esta reserva?')" >Eliminar</a>
        </td>
    </tr>
    <?php endforeach;?>

</table>
