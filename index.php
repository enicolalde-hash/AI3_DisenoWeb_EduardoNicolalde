<?php
$paginaActual = 'registro';
$tituloPagina = 'Tus actividades, mejor organizadas';
$subtituloPagina = 'Registra tus pendientes y revisa la información que guardaste en MariaDB, desde un mismo lugar.';
$resultado = $_GET['resultado'] ?? '';
require __DIR__ . '/includes/header.php';
?>

<section class="overview" aria-label="Resumen del proyecto">
    <div class="overview-icon" aria-hidden="true">✓</div>
    <div>
        <strong>Un espacio para llevar el control de mis actividades.</strong>
        <p>Registro en PHP, almacenamiento en MariaDB y consulta de registros en una tabla.</p>
    </div>
    <a href="consultar.php" class="text-link overview-link">Consultar registros <span aria-hidden="true">→</span></a>
</section>

<?php if ($resultado === 'guardado'): ?>
    <p class="notice notice-success" role="status">✓ Actividad registrada correctamente. Ya puedes verla en la consulta.</p>
<?php elseif ($resultado === 'error'): ?>
    <p class="notice notice-error" role="alert">Revisa los datos ingresados e intenta nuevamente.</p>
<?php elseif ($resultado === 'error_servidor'): ?>
    <p class="notice notice-error" role="alert">No fue posible guardar la actividad. Intenta nuevamente.</p>
<?php endif; ?>

<div class="content-layout">
    <section class="panel form-panel" id="registro" aria-labelledby="titulo-registro">
        <div class="section-heading">
            <div>
                <span class="eyebrow">FORMULARIO</span>
                <h2 id="titulo-registro">Registrar una actividad</h2>
                <p>Completa los datos de tu actividad. El sistema la guardará en la base de datos.</p>
            </div>
            <span class="step-tag">01 / REGISTRO</span>
        </div>

        <form action="guardar.php" method="POST">
            <div class="field">
                <label for="titulo">Nombre de la actividad <span class="required">*</span></label>
                <input type="text" id="titulo" name="titulo" maxlength="150"
                       placeholder="Ejemplo: Revisar la actividad de PHP" required>
            </div>

            <div class="field">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" maxlength="1000"
                          placeholder="Escribe un detalle de la actividad"></textarea>
                <small class="field-help">Puedes escribir hasta 1000 caracteres.</small>
            </div>

            <div class="field-grid">
                <div class="field">
                    <label for="prioridad">Prioridad <span class="required">*</span></label>
                    <select id="prioridad" name="prioridad" required>
                        <option value="alta">Alta</option>
                        <option value="media" selected>Media</option>
                        <option value="baja">Baja</option>
                    </select>
                </div>
                <div class="field">
                    <label for="responsable">Responsable <span class="required">*</span></label>
                    <input type="text" id="responsable" name="responsable" maxlength="100"
                           placeholder="Nombre del responsable" required>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="button button-primary">Guardar actividad <span aria-hidden="true">→</span></button>
                <a class="button button-outline" href="consultar.php">Ver actividades guardadas</a>
            </div>
        </form>
    </section>

    <aside class="sidebar" aria-label="Informacion del sistema">
        <section class="panel info-panel">
            <span class="eyebrow">CÓMO FUNCIONA</span>
            <h2>Un proceso sencillo</h2>
            <ol class="steps">
                <li><span>1</span><div><strong>Registra</strong><p>Ingresa los datos de la actividad en el formulario.</p></div></li>
                <li><span>2</span><div><strong>Guarda</strong><p>PHP valida los valores y los envía a MariaDB con PDO.</p></div></li>
                <li><span>3</span><div><strong>Consulta</strong><p>Revisa los registros desde una tabla protegida frente a XSS.</p></div></li>
            </ol>
        </section>
        <section class="note-panel">
            <span class="note-icon" aria-hidden="true">🔒</span>
            <div><strong>Datos protegidos</strong><p>El registro utiliza consultas preparadas y la consulta muestra los textos de forma segura.</p></div>
        </section>
    </aside>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
