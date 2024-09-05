<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Sitio;
use MVC\Router;

use Intervention\Image\ImageManagerStatic as Image;

class SitiosController{
    
    public static function index(Router $router){
        if(!is_admin()){
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/sitios?page=1');
        }

        $por_pagina = 10;
        $total = Sitio::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        $sitios = Sitio::paginar($por_pagina, $paginacion->offset());

        $router->render('admin/sitios/index', [
            'titulo' => 'Sitios turisticos ',
            'sitios' => $sitios,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router){
        if(!is_admin()){
            header('Location: /login');
        }

        $alertas=[];
        $sitio = new Sitio;

        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if(!is_admin()){
                header('Location: /login');
            }
            // leer imagen

            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/sitios'; // ruta de la carpeta de imagenes

                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            $sitio -> sincronizar($_POST);

            // validar

            $alertas = $sitio->validar();

            // guardar el registro

            if(empty($alertas)){
                // guardar las imagenes

                $imagen_png->save($carpeta_imagenes . '/'. $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/'. $nombre_imagen . ".webp");

                // Guardar en la base de datos

                $resultado = $sitio->guardar();
                if($resultado){
                    header('Location: /admin/sitios');
                }
            }
        }
        
        $router->render('admin/sitios/crear', [
            'titulo' => 'Registrar Sitios / Actividades',
            'alertas' => $alertas,
            'sitio' => $sitio
        ]);
    }

    public static function editar(Router $router){

        if(!is_admin()){
            header('Location: /login');
        }

        $alertas = [];

        // Validar el ID

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);


        if(!$id){
            header('Location: /admin/sitios');
        }


        $sitio = Sitio::find($id);
        if(!$sitio){
            header('Location: /admin/sitios');
        }

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            if(!is_admin()){
                header('Location: /login');
            }
            $args = $_POST['sitio'];

            $sitio->sincronizar($_POST);

            $alertas = $sitio->validar();

            if(empty($alertas)){
                $resultado = $sitio->actualizar();

                if($resultado){
                    header('Location: /admin/sitios');
                }
            }
        }
        $router->render('admin/sitios/editar', [
            'titulo' => 'Editar sitio turistico',
            'alertas' => $alertas,
            'sitio' => $sitio
        ]);

    }
    // Elimnar sitio
    public static function eliminar() {
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            } 
            $id = $_POST['id'];
            $sitio = Sitio::find($id);
            if(!isset($sitio) ) {
                header('Location: /admin/sitios');
            }
            $resultado = $sitio->eliminar();
            if($resultado) {
                header('Location: /admin/sitios');
            }
        }
    }

}