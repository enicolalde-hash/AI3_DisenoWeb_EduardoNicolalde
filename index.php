
<?php

require_once __DIR__ . '/config/conexion.php';

try {

    $conexion = conectar();

    echo "Conexion con la base de datos realizada correctamente.";

} catch (Throwable $error) {

    http_response_code(500);

    echo "No fue posible conectar con la base de datos.";
}
