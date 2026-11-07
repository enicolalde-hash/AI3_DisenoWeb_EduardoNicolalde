<?php
// Menu compartido por las paginas del sistema.
$paginaActual = $paginaActual ?? 'registro';
?>
<div class="topbar">
    <div class="container topbar-inner">
        <a class="brand" href="index.php#inicio" aria-label="Ir al inicio del sistema">
            <span class="brand-icon" aria-hidden="true">EA</span>
            <span class="brand-name">Mi Sistema <small>de Actividades</small></span>
        </a>

        <nav class="main-nav" aria-label="Menu principal">
            <a href="index.php#inicio">Inicio</a>
            <a href="index.php#registro" <?= $paginaActual === 'registro' ? 'class="active" aria-current="page"' : '' ?>>Registrar</a>
            <a href="consultar.php" <?= $paginaActual === 'consulta' ? 'class="active" aria-current="page"' : '' ?>>Consultar</a>
        </nav>

        <div class="nav-profile">
            <span>Eduardo Nicolalde <small>ECOTEC · 2026</small></span>
        </div>
    </div>
</div>
