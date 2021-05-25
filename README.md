# Intelly-test-back

_Prueba de intellygence App Factory_

## Pre-requisitos

_Que cosas necesitas para instalar el software_

* Docker

## Instalacion

_Paso a paso que debes ejecutar para tener un entorno de desarrollo ejecutandose_

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
Dentro del archivo .env configurar las variables de base de datos

DB_CONNECTION=mysql  
DB_HOST=db  
DB_PORT=3306  
DB_DATABASE=intelly-test  
DB_USERNAME=intelly-test  
DB_PASSWORD=intelly-test  

Generar llave de proyecto

```
php artisan key generate
```
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
