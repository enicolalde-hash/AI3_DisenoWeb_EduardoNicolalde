# Evidencias - Actividad Integradora 3

Proyecto: AI3_DisenoWeb_EduardoNicolalde
Repositorio: https://github.com/enicolalde-hash/AI3_DisenoWeb_EduardoNicolalde

Este paquete incluye capturas originales compartidas durante el desarrollo.

## Cinco evidencias de la rubrica

1. `01_bd/01_estructura_tabla_mariadb.png`: estructura de `actividades`, siete campos, clave primaria y autoincremento.
2. `06_desarrollo/17_sentencias_preparadas_codigo_real.png`: captura REAL de Visual Studio Code, archivo `guardar.php`, con `INSERT INTO`, `prepare()` y `execute()`. Se conserva ademas el extracto previo `01_bd/02_extracto_codigo_prepared_statements.png`, identificado como recreacion visual del codigo, no captura del editor.
3. `02_formulario/03_formulario_con_datos.png`: formulario de registro con campos completados.
4. `03_consulta/05_tabla_web_dos_registros.png`: tabla HTML con registros de MariaDB y caracteres HTML presentados como texto.
5. `04_git/07_historial_cinco_commits_github_desktop.png`: historial GitHub Desktop con cinco commits identificables.

## Evidencias complementarias

- Confirmacion tras guardar: `02_formulario/04_confirmacion_registro.png`.
- Prueba XSS con etiquetas como texto: `03_consulta/06_prueba_xss.png`.
- Validacion de formulario HTML5: `05_validacion/08_validacion_html5.png`.
- Respuesta 303 de PHP ante titulo vacio: `05_validacion/09_validacion_servidor_http303.png`.
- COUNT(*) = 2 al verificar que el rechazo no creo otro registro: `05_validacion/10_verificacion_dos_registros_sql.png`.
- Prueba conexion PDO y export SQL: carpeta `06_desarrollo`.

En el informe se explican las evidencias de manera breve. Se han evitado imagenes inventadas o capturas de acciones no realizadas.


## Evidencias nuevas de la presentacion final (7 de noviembre de 2026)

- `07_presentacion_final/15_consulta_con_menu_foto_y_dos_registros.png`: primera verificacion del diseno corregido de la pagina Consultar, con menu estilizado, fotografia de perfil y los dos registros originales. Captura del navegador local aportada por el estudiante.
- `07_presentacion_final/16_consulta_final_tres_registros.png`: prueba posterior al cambio visual que confirma tres registros mostrados en `consultar.php`, incluido «Revisar la presentacion final del sistema». La secuencia verifico que registrar y consultar sigue funcionando tras la mejora de interfaz. Captura del navegador local aportada por el estudiante.

## Evidencias de publicacion en InfinityFree

- `06_desarrollo/17_sentencias_preparadas_codigo_real.png`: captura real en Visual Studio Code de `guardar.php` con `prepare()` y `execute()` (evidencia de consultas preparadas).
- `07_presentacion_final/18_sitio_publicado_consulta_cero_registros.png`: pagina de consulta en InfinityFree mostrando base de datos nueva sin registros, antes de realizar la insercion de prueba.
- `07_presentacion_final/19_sitio_publicado_registro_y_consulta.png`: pagina `https://actividades-eduardo.xo.je/consultar.php` despues de insertar una actividad en el alojamiento: muestra un registro y el perfil del estudiante. Evidencia de PHP/PDO/MariaDB funcionando en linea.
- El sitio se mantiene bajo autenticacion de directorio: el docente necesitara credenciales compartidas por un medio privado para acceder; no publicar contrasenas en GitHub.

### Recomendacion antes de publicar el commit

- Mantener la evidencia de los cinco commits iniciales y conservar los commits siguientes como mejora del proyecto, sin alterar el historial.
- Ya esta incluida una captura real del editor con `prepare()` y `execute()` en `06_desarrollo/17_sentencias_preparadas_codigo_real.png`; el extracto visual previo permanece identificado como tal.
- Para mostrar especificamente la nueva pantalla de registro, capturar el navegador local con el formulario ya estilizado. Este paquete no inventa esa imagen.
- **No subir** `config/config.local.php`, el entorno local, archivos con credenciales, ni contenidos de `vendor/`.
