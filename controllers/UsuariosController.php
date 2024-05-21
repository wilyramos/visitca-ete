<?php

namespace Controllers;

use MVC\Router;
use Classes\Paginacion;

use Model\Usuario;



class UsuariosController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
    
        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/usuarios?page=1');
        }
    
        // paginacion
        $registros_por_pagina = 10;
        $total = Usuario::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);
    
    
        
        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/usuariros?page=1');
        }
    
        $usuarios = Usuario::paginar($registros_por_pagina, $paginacion->offset());
    
    
        $router->render('admin/usuarios/index', [
            'titulo' => 'usuarios',
            'usuarios' => $usuarios,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

}


