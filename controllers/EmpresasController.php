<?php
namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Empresa;
use Intervention\Image\ImageManagerStatic as Image;

class EmpresasController{
    
    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/empresas?page=1');
        }

        // paginacion
        $registros_por_pagina = 10;
        $total = Empresa::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);


        
        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/empresas?page=1');
        }

        $empresas = Empresa::paginar($registros_por_pagina, $paginacion->offset());


        $router->render('admin/empresas/index', [
            'titulo' => 'Empresas',
            'empresas' => $empresas,
            'paginacion' => $paginacion->paginacion()
        ]);
    }


    // Crear Empresa

    public static function crear(Router $router){
        if(!is_admin()){
            header('Location: /login');
        }

        $alertas=[];
        $empresa = new Empresa;

        if($_SERVER['REQUEST_METHOD']== 'POST'){
            if(!is_admin()){
                header('Location: /login');
            }
            // leer imagen

            if(!empty($_FILES['imagen']['tmp_name'])){
                $carpeta_imagenes = '../public/img/empresas'; // ruta de la carpeta de imagenes

                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            //$_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $empresa -> sincronizar($_POST);

            // validar

            $alertas = $empresa->validar();

            // guardar el registro

            if(empty($alertas)){
                // guardar las imagenes

                $imagen_png->save($carpeta_imagenes . '/'. $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/'. $nombre_imagen . ".webp");

                // Guardar en la base de datos

                $resultado = $empresa->guardar();
                if($resultado){
                    header('Location: /admin/empresas');
                }
            }
        }
        
        $router->render('admin/empresas/crear', [
            'titulo' => 'Registrar Empresa / Agencia',
            'alertas' => $alertas,
            'empresa' => $empresa
            //'redes' => json_decode($ponente->redes)
        ]);
    }

    // Editar Empresa

    public static function editar(Router $router){

        if(!is_admin()){
            header('Location: /login');
        }

        $alertas = [];

        // Validar el ID

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);


        if(!$id){
            header('Location: /admin/empresas');
        }


        $empresa = Empresa::find($id);
        if(!$empresa){
            header('Location: /admin/eventos');
        }

        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            if(!is_admin()){
                header('Location: /login');
            }
            $args = $_POST['empresa'];

            $empresa->sincronizar($_POST);

            $alertas = $empresa->validar();

            if(empty($alertas)){
                $resultado = $empresa->actualizar();

                if($resultado){
                    header('Location: /admin/empresas');
                }
            }
        }
        $router->render('admin/empresas/editar', [
            'titulo' => 'Editar Empresa',
            'alertas' => $alertas,
            'empresa' => $empresa
        ]);
    }

    // Eliminar Empresa
    public static function eliminar() {
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            } 
            $id = $_POST['id'];
            $empresa = Empresa::find($id);
            if(!isset($empresa) ) {
                header('Location: /admin/empresas');
            }
            $resultado = $empresa->eliminar();
            if($resultado) {
                header('Location: /admin/empresas');
            }
        }
    }
}
