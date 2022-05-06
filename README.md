Reto Tecnico de consultas de Zip Code de mexico.

## Instalacion

Instalacion de dependencias.

```shell
composer install
```

Variable de entorno

```shell
cp .env.example .env
```

Generar Key Applications

```shell
php artisan key:generate
```

Crear tablas de base de datos

```shell
php artisan migrate
```

Insertar informacion a la base de datos.

```shell
php artisan import:zipcodes
```

Url API

```shell
http://161.35.127.14:90/api/zip-codes/{code}
```
