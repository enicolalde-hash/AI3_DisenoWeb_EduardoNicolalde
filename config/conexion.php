
<?php

/* Conexion segura a la base de datos mediante PDO */

function conectar(): PDO
{
    try {
        $config = require __DIR__ . '/config.local.php';

        $dsn = "mysql:host={$config['host']};" .
               "dbname={$config['database']};" .
               "charset=utf8mb4";

        $conexion = new PDO(
            $dsn,
            $config['user'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );

        return $conexion;

    } catch (Throwable $error) {

        error_log("Error de conexion: " . $error->getMessage());

        throw new RuntimeException(
            "No fue posible conectar con la base de datos."
        );
    }
}
