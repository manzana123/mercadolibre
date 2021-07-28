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


### 3) 

## 3.1) 
