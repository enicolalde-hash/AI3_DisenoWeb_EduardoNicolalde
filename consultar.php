<?php
require_once __DIR__ . '/config/conexion.php';

// Evitar interpretar como HTML lo que viene de la base de datos.
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
    $sql = "SELECT id, titulo, descripcion, prioridad, estado,
                   responsable, fecha_creacion
            FROM actividades
            ORDER BY fecha_creacion DESC, id DESC";
    $sentencia = $conexion->query($sql);
    $actividades = $sentencia->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $error) {
    error_log('Error al consultar actividades: ' . $error->getMessage());
    $errorConsulta = true;
}

$paginaActual = 'consulta';
$tituloPagina = 'Consulta tus actividades';
$subtituloPagina = 'Todos los registros guardados en la base de datos, en un solo lugar.';
require __DIR__ . '/includes/header.php';
?>

<section class="panel records-panel" aria-labelledby="titulo-consulta">
    <div class="section-heading records-heading">
        <div>
            <span class="eyebrow">REGISTROS GUARDADOS</span>
            <h2 id="titulo-consulta">Actividades registradas</h2>
            <p>Información consultada directamente desde MariaDB.</p>
        </div>
        <div class="records-actions">
            <?php if (!$errorConsulta): ?>
                <span class="counter"><strong><?= count($actividades) ?></strong> actividad(es)</span>
            <?php endif; ?>
            <a href="index.php#registro" class="button button-primary">+ Nueva actividad</a>
        </div>
    </div>

    <?php if ($errorConsulta): ?>
        <p class="notice notice-error" role="alert">No fue posible consultar las actividades. Revisa la conexión y vuelve a intentarlo.</p>
    <?php elseif (empty($actividades)): ?>
        <div class="empty-state">
            <span aria-hidden="true">▤</span>
            <h3>Todavía no tienes actividades registradas</h3>
            <p>Registra la primera desde el formulario para que aparezca aquí.</p>
            <a href="index.php#registro" class="button button-primary">Ir al registro</a>
        </div>
    <?php else: ?>
        <div class="tabla-contenedor" role="region" aria-label="Tabla de actividades" tabindex="0">
            <table class="tabla-actividades">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Prioridad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($actividades as $actividad): ?>
                        <?php
                        $prioridad = (string) ($actividad['prioridad'] ?? '');
                        $prioridadClase = in_array($prioridad, ['alta', 'media', 'baja'], true) ? $prioridad : 'media';
                        $estado = (string) ($actividad['estado'] ?? '');
                        $estadoClase = $estado === 'completada' ? 'completada' : 'pendiente';
                        ?>
                        <tr>
                            <td class="id-cell">#<?= escapar($actividad['id']) ?></td>
                            <td><strong><?= escapar($actividad['titulo']) ?></strong></td>
                            <td class="description-cell"><?= nl2br(escapar($actividad['descripcion'])) ?></td>
                            <td><span class="state-badge priority-<?= $prioridadClase ?>"><?= escapar($prioridad) ?></span></td>
                            <td><span class="state-badge state-<?= $estadoClase ?>"><?= escapar($estado) ?></span></td>
                            <td><?= escapar($actividad['responsable']) ?></td>
                            <td class="date-cell"><?= escapar($actividad['fecha_creacion']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="table-hint">En pantallas pequeñas puedes desplazar la tabla de lado a lado.</p>
    <?php endif; ?>
</section>

<section class="bottom-actions">
    <a href="index.php#registro" class="text-link">← Volver al formulario de registro</a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
