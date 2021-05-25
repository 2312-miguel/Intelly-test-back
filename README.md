# Intelly-test-back

_Prueba de intellygence App Factory_

## Pre-requisitos

_Que cosas necesitas para instalar el software_

* Docker

## Instalacion

_Paso a paso que debes ejecutar para tener un entorno de desarrollo ejecutandose_
## Arrancar aplicacion (XAMPP)

Agregar proyecto a la ruta : xampp\htdocs

## Arrancar aplicacion (Docker)

_Como poner en marcha la aplicacion_

* Montar contenedor

```
docher-compose up -d
```

* Instalar dependencias

```
composer install
```
* Configurar variables de entorno

```
cp .env.example .env
```
_Dentro del archivo .env configurar las variables de base de datos_

DB_CONNECTION=mysql  
DB_HOST=db  
DB_PORT=3306  
DB_DATABASE=intelly-test  
DB_USERNAME=intelly-test  
DB_PASSWORD=intelly-test  

_Configuracion email_

MAIL_MAILER=smtp  
MAIL_HOST=smtp.googlemail.com  
MAIL_PORT=587  
MAIL_USERNAME=user@gmail.com  
MAIL_PASSWORD=111111  
MAIL_ENCRYPTION=tls  
MAIL_FROM_ADDRESS=user@gmail.com  
MAIL_FROM_NAME="${APP_NAME}"  

_Generar llave de proyecto_

```
php artisan key generate
```

_Creacion de Tablas en base de datos_
```
php artisan migrate
```

## Construido con:

* Laraver

Base de datos

* mysql

## Versionado 

* laravel -v 8
* php -v 7.4.19
* mysql -v 8
