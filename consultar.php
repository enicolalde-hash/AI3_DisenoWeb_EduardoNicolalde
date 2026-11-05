
<?php

require_once __DIR__ . '/config/conexion.php';

/* Proteger los datos antes de mostrarlos en HTML */
function escapar($valor): string
{
    return htmlspecialchars(
        (string) ($valor ?? ''),
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

$actividades = [];
$errorConsulta = false;

try {
    $conexion = conectar();

    $sql = "SELECT id, titulo, descripcion,
                   prioridad, estado, responsable,
                   fecha_creacion
            FROM actividades
            ORDER BY fecha_creacion DESC, id DESC";

    $sentencia = $conexion->query($sql);
    $actividades = $sentencia->fetchAll(PDO::FETCH_ASSOC);

} catch (Throwable $error) {
    error_log("Error al consultar actividades: " . $error->getMessage());
    $errorConsulta = true;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar actividades</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <h1>Mi Sistema de Actividades</h1>
    <p>Consulta de actividades registradas</p>
</header>

<main>

    <section class="panel">

        <h2>Actividades registradas</h2>

        <p>
            <a href="index.php" class="enlace-consulta">
                Registrar nueva actividad
            </a>
        </p>

        <?php if ($errorConsulta): ?>

            <p class="mensaje-error">
                No fue posible consultar las actividades.
            </p>

        <?php elseif (empty($actividades)): ?>

            <p>Todavía no hay actividades registradas.</p>

        <?php else: ?>

            <div class="tabla-contenedor">

                <table class="tabla-actividades">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Actividad</th>
                            <th>Descripción</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th>Fecha de creación</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($actividades as $actividad): ?>

                        <tr>
                            <td><?= escapar($actividad['id']) ?></td>
                            <td><?= escapar($actividad['titulo']) ?></td>
                            <td><?= escapar($actividad['descripcion']) ?></td>
                            <td><?= escapar($actividad['prioridad']) ?></td>
                            <td><?= escapar($actividad['estado']) ?></td>
                            <td><?= escapar($actividad['responsable']) ?></td>
                            <td><?= escapar($actividad['fecha_creacion']) ?></td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

        <?php endif; ?>

    </section>

</main>

<footer>
    <p>Eduardo Nicolalde - ECOTEC - 2026</p>
</footer>

</body>
</html>
