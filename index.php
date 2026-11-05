
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Web de Actividades</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <h1>Mi Sistema de Actividades</h1>
        <p>Registro y seguimiento de actividades</p>
    </header>

    <main>
        <section class="panel">
            <h2>Registrar una actividad</h2>

<?php
$resultado = $_GET['resultado'] ?? '';

if ($resultado === 'guardado') {
    echo '<p class="mensaje-exito">
        Actividad registrada correctamente.
    </p>';
} elseif ($resultado === 'error') {
    echo '<p class="mensaje-error">
        Revisa los datos ingresados e intenta nuevamente.
    </p>';
} elseif ($resultado === 'error_servidor') {
    echo '<p class="mensaje-error">
        No fue posible guardar la actividad.
    </p>';
}
?>
            <form action="guardar.php" method="POST">

                <label for="titulo">Nombre de la actividad</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    maxlength="150"
                    placeholder="Ejemplo: Revisar actividad de PHP"
                    required
                >

                <label for="descripcion">Descripción</label>
                <textarea
                    id="descripcion"
                    name="descripcion"
                    rows="4"
                    placeholder="Escribe un detalle de la actividad"
                ></textarea>

                <label for="prioridad">Prioridad</label>
                <select id="prioridad" name="prioridad" required>
                    <option value="alta">Alta</option>
                    <option value="media" selected>Media</option>
                    <option value="baja">Baja</option>
                </select>

                <label for="responsable">Responsable</label>
                <input
                    type="text"
                    id="responsable"
                    name="responsable"
                    maxlength="100"
                    placeholder="Nombre del responsable"
                    required
                >

                <button type="submit">Guardar actividad</button>

            </form>
        </section>
    </main>

    <footer>
        <p>Eduardo Nicolalde - ECOTEC - 2026</p>
    </footer>

</body>
</html>
