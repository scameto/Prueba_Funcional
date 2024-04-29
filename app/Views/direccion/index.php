<h1>Listado de Direcciones</h1>
<a href="<?= base_url('direccion/create') ?>">Crear Nueva Dirección</a>
<table>
    <tr>
        <th>ID</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>País</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($direcciones as $direccion): ?>
    <tr>
        <td><?= $direccion['id'] ?></td>
        <td><?= $direccion['latitud'] ?></td>
        <td><?= $direccion['longitud'] ?></td>
        <td><?= $direccion['dir'] ?></td>
        <td><?= $direccion['ciudad'] ?></td>
        <td><?= $direccion['pais'] ?></td>
        <td>
            <a href="<?= site_url('direccion/' . $direccion['id']) ?>">Editar</a>
            <a href="<?= site_url('direccion/delete/' . $direccion['id']) ?>" onclick="return confirm('¿Está seguro de eliminar esta dirección?')" >Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
