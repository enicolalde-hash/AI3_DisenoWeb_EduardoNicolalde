<?php
// Cabecera reutilizable. Los valores se asignan en index.php o consultar.php.
$paginaActual = $paginaActual ?? 'registro';
$tituloPagina = $tituloPagina ?? 'Mi Sistema de Actividades';
$subtituloPagina = $subtituloPagina ?? 'Registro y seguimiento de actividades';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema web de registro y consulta de actividades desarrollado con PHP y MariaDB.">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?> | Eduardo Nicolalde</title>
    <link rel="stylesheet" href="css/estilos.css?v=20261107-2">
</head>
<body>
<a class="skip-link" href="#contenido">Saltar al contenido</a>
<?php require __DIR__ . '/nav.php'; ?>

<header class="hero" id="inicio">
    <div class="container hero-inner">
        <div class="hero-copy">
            <span class="eyebrow hero-eyebrow">PROYECTO UNIVERSITARIO · ECOTEC 2026</span>
            <h1><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?></h1>
            <p><?= htmlspecialchars($subtituloPagina, ENT_QUOTES, 'UTF-8') ?></p>
            <div class="hero-actions">
                <a class="button button-light" href="index.php#registro">Registrar actividad <span aria-hidden="true">↗</span></a>
                <a class="button button-ghost" href="consultar.php">Ver actividades</a>
            </div>
        </div>
        <div class="hero-profile">
            <img class="hero-photo" src="img/eduardo.png" alt="Fotografía de Eduardo Nicolalde" width="116" height="116">
            <div>
                <span class="profile-caption">SISTEMA PERSONAL DE</span>
                <strong>Eduardo Nicolalde</strong>
                <span class="profile-details">Programación de Sistemas Web</span>
                <span class="profile-chip">PHP · PDO · MariaDB</span>
            </div>
        </div>
    </div>
</header>

<main class="page-shell container" id="contenido">
