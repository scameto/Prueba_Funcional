

<h1><?= isset($direccion['id']) ? 'Editar' : 'Crear Nueva'; ?> Dirección</h1>
<form method="post" action="<?= isset($direccion['id']) ? base_url('direccion/' . $direccion['id']) : base_url('direccion'); ?>">
    <input type="hidden" name="_method" value="<?= isset($direccion['id']) ? 'PUT' : 'POST' ?>">
    <label for="latitud">Latitud:</label>
    <input type="text" name="latitud" id="latitud" value="<?= $direccion['latitud'] ?? '' ?>" required>
    <label for="longitud">Longitud:</label>
    <input type="text" name="longitud" id="longitud" value="<?= $direccion['longitud'] ?? '' ?>" required>
    <label for="dir">Dirección:</label>
    <input type="text" name="dir" id="dir" value="<?= $direccion['dir'] ?? '' ?>" required>
    <label for="ciudad">Ciudad:</label>
    <input type="text" name="ciudad" id="ciudad" value="<?= $direccion['ciudad'] ?? '' ?>" required>
    <label for="pais">País:</label>
    <input type="text" name="pais" id="pais" value="<?= $direccion['pais'] ?? '' ?>" required>
    <button type="submit"><?= isset($direccion['id']) ? 'Actualizar' : 'Crear'; ?></button>
</form>
