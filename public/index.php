<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;


use Controllers\EmpresasController;
use Controllers\PonentesController;




use Controllers\EventosController;
use Controllers\SitiosController;

use Controllers\RegistradosController;
use Controllers\RegalosController;
use Controllers\APIEventos;
use Controllers\APIPonentes;
use Controllers\PaginasController;
use Controllers\RegistroController;
use Controllers\UsuariosController;
use Controllers\RecomendacionController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Panel de Administración

$router->get('/admin/dashboard', [DashboardController::class, 'index']);



// Empresas

$router->get('/admin/empresas', [EmpresasController::class, 'index']);
$router->get('/admin/empresas/crear', [EmpresasController::class, 'crear']);
$router->post('/admin/empresas/crear', [EmpresasController::class, 'crear']);
$router->get('/admin/empresas/editar', [EmpresasController::class, 'editar']);
$router->post('/admin/empresas/editar', [EmpresasController::class, 'editar']);
$router->post('/admin/empresas/eliminar', [EmpresasController::class, 'eliminar']);




//Sitios

$router->get('/admin/sitios', [SitiosController::class, 'index']);
$router->get('/admin/sitios/crear', [SitiosController::class, 'crear']);
$router->post('/admin/sitios/crear', [SitiosController::class, 'crear']);
$router->get('/admin/sitios/editar', [SitiosController::class, 'editar']);
$router->post('/admin/sitios/editar', [SitiosController::class, 'editar']);
$router->post('/admin/sitios/eliminar', [SitiosController::class, 'eliminar']);




$router->get('/admin/usuarios', [UsuariosController::class, 'index']);

// Area publica

$router->get('/', [PaginasController::class, 'index']);
$router->get('/devwebcamp', [PaginasController::class, 'evento']);
$router->get('/paquetes', [PaginasController::class, 'paquetes']);
$router->get('/workshops-conferencias', [PaginasController::class, 'conferencias']);
$router->get('/404', [PaginasController::class, 'error']);

// Area publica

// $router->get('/recomendacion', [PaginasController::class, 'recomendacion']);

$router->get('/recomendacion', [RecomendacionController::class, 'recomendacion']);
$router->get('/sitios', [PaginasController::class, 'sitios']);
$router->get('/sitio', [PaginasController::class, 'sitio']);


$router->comprobarRutas();