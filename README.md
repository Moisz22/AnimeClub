# AnimeClub

Página web de uso personal para guardar registros de un anime que ya terminó de ver, que está viendo actualmente o que tiene pendiente por ver.


## Demo ⛏️
#

https://animeclub1.herokuapp.com/

## Construido con 🛠️
#
- PHP
- MYSQL
- <a href="https://getbootstrap.com/">Bootstrap</a>

- <a href="https://alertifyjs.com/">AlertifyJS</a>

- <a href="https://sweetalert2.github.io/">Sweet Alert 2</a>

- <a href="https://jquery.com/">Jquery</a>

- <a href="https://www.npmjs.com/">NPM</a> - Gestor de paquetes

## Pre-requisitos 📋
#
- <a href="https://nodejs.org/">NodeJS</a>

- PHP 8.0.0

- MySQL 8.0.0

## Inicio rápido 🚀
#
1. Vaya al directorio raiz del proyecto y ejecute el comando `npm install` para instalar las dependencias.

2. Cree la base de datos con el nombre **series_vistas** y a continuación importe el archivo **series_vistas.sql** que se encuentra en el directorio raiz del proyecto.

3. Vaya al archivo **config.php** que se encuentra en la ruta config/config.php y modifique el arreglo **bd_config** con sus credenciales de base de datos.
    ```
    $bd_config = array(
        'servidor'    => 'localhost',
        'servidor_db'    => 'mysql',
        'puerto'         => '3306',
        'basedatos'      => 'series_vistas',
        'usuario'        => 'root',
        'password'       =>  ''
    );
    ```
## Usuario por defecto para iniciar sesión
#
- usuario: root

- password: 123456

## Licencia 📄
#
Este proyecto está bajo la Licencia (MIT) - mira el archivo [LICENSE.MD](LICENSE.md) para detalles.