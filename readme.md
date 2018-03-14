#Instalacion del proyecto:

###Despues de clonar el repositorio y posicionarse dentro

```composer install```


###Crear el archivo .env en la base del proyecto con la  siguente configuracion
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:RIX9M02J+EinNItYcy0A7SzmsmVs6kyTwcWZSbzIPqs=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rh-empleados
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
```


###Generar la base de datos(paso manual)
nombre de la database
```rh-empleados``


###Cargar las tablas
```php artisan migrate```

###Generar los seeds
```php artisan db:seed```

###Levantar el servicio
```php artisan serve``