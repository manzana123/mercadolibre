### 1) Inicializar proyecto
## 1.1) Crear proyecto en git, clonar con gitbash, colocar los archivos del profe en la carpeta
## (Dockerfile, docker-compose, etc), y modificar el docker-compose segun sea el proyecto.
## Probar si funciona levantando el contenedor:
docker-compose build
docker-compose up -d
## en el navegador entrar con:
localhost:puerto

## 1.2)Generar proyecto en Laravel, usando el siguiente comando dentro del shell de laravel 
## (ir a extension de docker en VisualStudio, click derecho en el contenedor de laravel, attach shell):
composer create-project laravel/laravel nombredelproyecto

## 1.3)Arreglar problema de windows de carpetas de solo lectura (en el mismo shell) con:
chmod -R 777 nombredelproyecto/storage
## en el navegador comprobar si carga la pagina, entrando con 
localhost:puerto/nombredelproyecto


### 2) Hacer rutas y vistas
## 2.1) Construir vistas dentro de la carpeta:
web/resources/views/nombrevista.blade.php
## usar bootstrap para diseñar pagina

## 2.2) Modificar el sistema de rutas para que sea fijo en un archivo
## para ello, vamos a:
routes/web.php 
## y definimos las rutas con la siguiente estructura:
Route::view("ruta","nombrevista")->name("nombreruta");
## y luego lo referenciamos con:
href="{{route('nombreruta')}}"
## tambien crear las vistas a las que se hace referencia, en la carpeta resources/views

## 2.3) Para que todas las vistas compartan cierto codigo, generamos una carpeta layouts en views
## y dentro creamos un archivo que corresponda al master (podemos llamarla master.blade.php)
## En el master, utilizamos:
@yield("nombrecontenido")
## para indicar que esa seccion sera leida desde cada vista, mientras que en las vistas colocamos:
@section("nombrecontenido")
    contenido de la vista
@endsection


### 3) Generar Comunicacion de peticiones para js

## 3.1) en el master crear en el head, la etiqueta meta:
name="csrf-token" content="{{csrf_token()}}"

## 3.2) crear en la carpeta public/resources/js el archivo de axios_config, y dentro colocar:
window.axios.defaults.headers.common["X-CSRF-TOKEN"] = document.querySelector("meta[name='csrf-token']").content;

## 3.3) nuevamente en el master, en la parte de los script, colocar los siguientes:
src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"
src="{{asset('js/axios_config.js')}}"

## 3.4) generar controller accediendo a la shell de laravel, despues ingresar a la carpeta del proyecto (cd nombre) y luego ejecutar:
php artisan make:controller NombreController
## y acto seguido generar las funciones get y post correspondientes

## 3.5) para acceder a la funcion del controller, debemos llamar la ruta en el archivo api.php, utilizando:
//Route::post|get("endpoint|final de la url",[controlador::class,"metodo"])
## e importar el controlador al inicio del archivo con:
use App\Http\Controllers\NombreControlador;

### 4) comenzamos a manejar bases de datos, y en el archivo .env cambiamos el nombre de la base de datos, como:
DB_CONNECTION=mysql
DB_HOST=db-mercadolibre (este dato se cambia)
DB_PORT=3306
DB_DATABASE=mercadolibre_db (este dato se cambia)
DB_USERNAME=root
DB_PASSWORD=123456 (este dato se cambia)
## estos valores se cambian segun el dockerfile

## 4.1) despues procedemos a realizar una migracion en el shell de laravel 
## (y luego entrar a la carpeta del proyecto), utilizando el comando:
php artisan migrate

## 4.2) procedemos a crear una tabla por medio de una migracion con el siguiente codigo (en la misma shell):
php artisan make:migration crear_tabla_nombretabla --create=nombretablaenplural
## y procedemos a modificar los datos de la tabla en el archivo web/database/migrations/nombredelamigracion
## y volvemos a realizar una migracion

## 4.3) creamos un modelo a partir de la tabla migrada:
php artisan make:model PrimeraLetraEnMayusculaynombredetablaensingular
## este modelo nos permite trabajar entidades en la base de datos, en respecto de la tabla que se basa el modelo
## para utilizarlo en el controller, lo importamos con:
use App\Models\Nombredelmodelo;

## 4.4) luego vamos al api.php para escribir las rutas de las nuevas funciones

