# Sistema Web de Actividades

**Universidad:** ECOTEC  
**Asignatura:** Programación de Sistemas Web  
**Actividad:** Integradora 3  
**Estudiante:** Eduardo Enrique Nicolalde Reinoso  
**Año:** 2026

## Descripción

Este proyecto permite registrar actividades y consultar los datos guardados en MariaDB. Lo desarrollé en PHP y fui comprobando cada parte desde XAMPP y phpMyAdmin.

Como mejora de presentación, organicé las páginas con un menú para ir al inicio, al registro y a la consulta. También incorporé mi fotografía y ajusté los colores, los botones y la tabla para que resulte más cómoda de usar. La conexión y el proceso de guardado siguen funcionando como en las primeras pruebas.

## Herramientas utilizadas

- Visual Studio Code para editar los archivos.
- HTML5 y CSS3 para las pantallas.
- PHP y PDO para trabajar con MariaDB.
- XAMPP y phpMyAdmin para ejecutar y comprobar el proyecto.
- Git y GitHub para guardar los avances.

## Funcionalidades

- Menú de navegación entre registro y consulta.
- Formulario con título, descripción, prioridad y responsable.
- Validación de datos en HTML5 y también desde PHP.
- Registro en MariaDB utilizando sentencias preparadas.
- Tabla de consulta con desplazamiento horizontal en pantallas pequeñas.
- Protección de las salidas de texto mediante `htmlspecialchars()`.
- Fecha de creación, estado inicial e identificador asignados en la base de datos.

## Organización de archivos

```text
AI3_DisenoWeb_EduardoNicolalde/
├── config/
│   ├── conexion.php
│   └── config.local.php  (archivo local, no se publica)
├── css/
│   └── estilos.css
├── database/
│   └── db_sistema_web.sql
├── img/
│   └── eduardo.png
├── includes/
│   ├── header.php
│   ├── nav.php
│   └── footer.php
├── index.php
├── guardar.php
├── consultar.php
├── .gitignore
└── README.md
```

## Cómo ejecutar el proyecto en XAMPP

1. Copiar la carpeta `AI3_DisenoWeb_EduardoNicolalde` en `C:\xampp\htdocs`.
2. Iniciar Apache y MySQL desde XAMPP.
3. Abrir phpMyAdmin y crear la base de datos `db_sistema_web` si todavía no existe.
4. Importar `database/db_sistema_web.sql` en esa base de datos.
5. Crear `config/config.local.php` con los datos de conexión de tu entorno local.
6. Abrir `http://localhost/AI3_DisenoWeb_EduardoNicolalde/`.

**Importante:** El archivo `config.local.php` está excluido mediante `.gitignore` para no publicar credenciales. Si importas el SQL en una base de datos que ya tiene la tabla, puede aparecer el error «la tabla ya existe»: no es necesario volver a importarlo en ese caso.

## Navegación

- **Inicio:** presenta el sistema y sus accesos principales.
- **Registrar:** permite ingresar una nueva actividad desde `index.php#registro`.
- **Consultar:** muestra los registros guardados desde `consultar.php`.

## Seguridad aplicada

En `guardar.php` utilicé PDO con `prepare()` y `execute()` para registrar los datos sin mezclarlos directamente con la instrucción SQL. En `consultar.php` empleo `htmlspecialchars()` para que las etiquetas HTML almacenadas se vean como texto.

Probé que PHP rechaza actividades sin título, incluso cuando los datos se envían directamente al servidor, y comprobé el resultado desde phpMyAdmin. También guardé una descripción con etiquetas HTML para revisar cómo aparecía en la consulta.

## Publicación del proyecto

**Repositorio público:** https://github.com/enicolalde-hash/AI3_DisenoWeb_EduardoNicolalde

GitHub permite revisar el código, los commits y la documentación. La aplicación real utiliza PHP y MariaDB, por lo que se ejecuta en XAMPP o en un servidor que admita estas tecnologías. **GitHub Pages no puede ejecutar el sistema PHP con su base de datos.**

## Versión publicada en internet

El sistema también fue instalado y probado en InfinityFree.

Sitio web:
https://actividades-eduardo.xo.je/

La aplicación funciona con PHP, PDO y una base de datos
MySQL independiente del entorno local de XAMPP.

Por seguridad, el sitio tiene acceso protegido.
Las credenciales se proporcionan únicamente
a las personas autorizadas.


## Aprendizaje personal

Este trabajo me ayudó a comprender cómo pasan los datos de un formulario a PHP y después a MariaDB. Al mejorar la interfaz, también practiqué cómo organizar archivos compartidos para no repetir la misma cabecera y el menú en cada página.


