<?php

namespace Controllers;

use MVC\Router;
use Model\Sitio;
use Model\Empresa;


class PaginasController {
    public static function index(Router $router) {
        
        // obtener los sitios
        $sitios = Sitio::all();
        // obtener las empresas
        $empresas = Empresa::all();


        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'sitios' => $sitios,
            'empresas' => $empresas
        ]);
    }

    public static function sitios(Router $router) {
        $sitios = Sitio::all();
        $router->render('paginas/sitios', [
            'titulo' => 'Sitios turisticos',
            'sitios' => $sitios
        ]);
    }

    public static function error(Router $router) {
        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }

    public static function recomendacion(Router $router) {
        // obtener los sitios
        $sitios = Sitio::all();
        // obtener las empresas
        $empresas = Empresa::all();

        $router->render('paginas/recomendacion', [
            'titulo' => 'Recomendacion',
            'sitios' => $sitios,
            'empresas' => $empresas
            
        ]);
    }

}

