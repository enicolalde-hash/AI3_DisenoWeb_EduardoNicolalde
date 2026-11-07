# Sistema Web de Actividades

**Universidad:** ECOTEC  
**Asignatura:** Programación de Sistemas Web  
**Actividad:** Integradora 3  
**Estudiante:** Eduardo Enrique Nicolalde Reinoso  
**Año:** 2026

## Descripción

Este proyecto consiste en una aplicación web para registrar actividades y consultar la información guardada en MariaDB.

Durante el desarrollo trabajé con formularios HTML, PHP y conexiones a bases de datos. Fui realizando las pruebas en XAMPP para comprobar que cada parte funcionara.

## Herramientas utilizadas

- HTML5 y CSS3 para las páginas.
- PHP para procesar los datos.
- PDO para conectarme a MariaDB.
- XAMPP y phpMyAdmin para las pruebas.
- Visual Studio Code para trabajar con los archivos.
- Git y GitHub para guardar los avances.

## Funcionalidades

- Registrar actividades con título, descripción, prioridad y responsable.
- Revisar los datos antes de guardarlos.
- Consultar los registros desde una tabla HTML.
- Guardar la fecha de creación automáticamente.
- Mostrar mensajes cuando una actividad se registra o cuando hay errores.

## Organización del proyecto

    AI3_DisenoWeb_EduardoNicolalde/
    ├── config/
    │   ├── conexion.php
    │   └── config.local.php (archivo local no publicado)
    ├── css/
    │   └── estilos.css
    ├── database/
    │   └── db_sistema_web.sql
    ├── index.php
    ├── guardar.php
    ├── consultar.php
    ├── .gitignore
    └── README.md

## Instalación local

1. Copiar el proyecto dentro de `C:\xampp\htdocs`.
2. Encender Apache y MySQL desde XAMPP.
3. Crear la base de datos `db_sistema_web` en phpMyAdmin.
4. Importar el archivo `database/db_sistema_web.sql`.
5. Crear `config/config.local.php` con los datos de conexión del equipo.
6. Abrir `http://localhost/AI3_DisenoWeb_EduardoNicolalde/`.

El archivo de configuración local está excluido de Git para no publicar las credenciales.

## Seguridad aplicada

Para guardar las actividades utilicé PDO. En el archivo `guardar.php` preparé la consulta con `prepare()` y envié los datos mediante `execute()`. De esta manera, los valores del formulario se procesan por separado de la instrucción SQL, lo que ayuda a evitar la inyección SQL.

En `consultar.php` utilicé `htmlspecialchars()` para mostrar la información. Lo comprobé registrando una descripción con etiquetas HTML. Cuando consulté la actividad, las etiquetas aparecieron como texto y no se aplicó el formato que contenían.

También probé las validaciones del formulario y de PHP para comprobar qué ocurre cuando se intenta registrar una actividad sin título.

## Pruebas realizadas

Primero comprobé la conexión con MariaDB. Después registré una actividad y revisé en phpMyAdmin que los datos se hubieran guardado correctamente.

También hice una prueba con etiquetas HTML y otra enviando un título vacío directamente al servidor. En esta última prueba, PHP rechazó el registro y confirmé que la base de datos seguía teniendo únicamente las dos actividades válidas.

## Aprendizaje personal

Con esta actividad entendí mejor cómo PHP recibe los datos de un formulario y los guarda en una base de datos. También pude comprobar por qué es necesario validar la información desde el servidor, aunque el formulario ya tenga sus propias validaciones.

**Estado:** Proyecto desarrollado y probado en el entorno local.