
<?php

require_once __DIR__ . '/config/conexion.php';

/* Solo permitir solicitudes desde el formulario */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

/* Recibir los datos del formulario */
$titulo = $_POST['titulo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$prioridad = $_POST['prioridad'] ?? '';
$responsable = $_POST['responsable'] ?? '';

/* Comprobar que los datos sean texto */
if (
    !is_string($titulo) ||
    !is_string($descripcion) ||
    !is_string($prioridad) ||
    !is_string($responsable)
) {
    header('Location: index.php?resultado=error', true, 303);
    exit;
}

/* Quitar espacios innecesarios */
$titulo = trim($titulo);
$descripcion = trim($descripcion);
$prioridad = trim($prioridad);
$responsable = trim($responsable);

/* Validar los datos en el servidor */
if (
    $titulo === '' ||
    mb_strlen($titulo) > 150 ||
    mb_strlen($descripcion) > 1000 ||
    $responsable === '' ||
    mb_strlen($responsable) > 100 ||
    !in_array($prioridad, ['alta', 'media', 'baja'], true)
) {
    header('Location: index.php?resultado=error', true, 303);
    exit;
}

try {
    /* Conectar con MariaDB */
    $conexion = conectar();

    /* Preparar una consulta segura */
    $sql = "INSERT INTO actividades
            (titulo, descripcion, prioridad, responsable)
            VALUES
            (:titulo, :descripcion, :prioridad, :responsable)";

    $sentencia = $conexion->prepare($sql);

    /* Enviar los valores por separado */
    $sentencia->execute([
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':prioridad' => $prioridad,
        ':responsable' => $responsable
    ]);

    /* Regresar al formulario */
    header('Location: index.php?resultado=guardado', true, 303);
    exit;

} catch (Throwable $error) {

    error_log("Error al guardar actividad: " . $error->getMessage());

    header('Location: index.php?resultado=error_servidor', true, 303);
    exit;
}
