<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Opinión</title>
</head>
<body>
    <h1>Crear Opinión</h1>
    <form action="opiniones/guardar_opiniones" method="post">
        <div>
            <label for="opinionAlojamiento">Opinión sobre el alojamiento:</label><br>
            <textarea id="opinionAlojamiento" name="opinionAlojamiento" required></textarea>
        </div>
        <div>
            <label for="puntuacionAlojamiento">Puntuación del alojamiento (1-5):</label><br>
            <input type="number" id="puntuacionAlojamiento" name="puntuacionAlojamiento" required min="1" max="5">
        </div>
        <div>
            <label for="opinionEmpresa">Opinión sobre la empresa:</label><br>
            <textarea id="opinionEmpresa" name="opinionEmpresa" required></textarea>
        </div>
        <div>
            <label for="puntuacionEmpresa">Puntuación de la empresa (1-5):</label><br>
            <input type="number" id="puntuacionEmpresa" name="puntuacionEmpresa" required min="1" max="5">
        </div>
        <div>
            <button type="submit">Guardar Opinión</button>
        </div>
    </form>
</body>
</html>
