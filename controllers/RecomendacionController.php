<?php
namespace Controllers;

use Model\Usuario;
use Model\Actividad;
use Model\Preferencias;
use Model\Sitio;
use Model\Empresa;

use MVC\Router;

class RecomendacionController {

    public static function recomendacion(Router $router) {
        
        
        // Definir usuarios, actividades y preferencias
        $usuarios = array();
        $actividades = array();
        $preferencias = array();
        
        // Crear usuarios
        $usuarios[] = new Usuario(1, "Juan", "Perez", "juan@example.com", "123456789");
        $usuarios[] = new Usuario(2, "Maria", "Gomez", "maria@example.com", "987654321");
        $usuarios[] = new Usuario(3, "Carlos", "Lopez", "carlos@example.com", "456789123");
        $usuarios[] = new Usuario(4, "Ana", "Martinez", "ana@example.com", "456123789");
        
        // Crear actividades
        $actividades[] = new Actividad(1, "Senderismo", "Actividad de caminata en la naturaleza.");
        $actividades[] = new Actividad(2, "Visita a museos", "Explorar museos y exposiciones.");
        $actividades[] = new Actividad(3, "Playa", "Día de playa y actividades acuáticas.");
        $actividades[] = new Actividad(4, "Excursión en bicicleta", "Paseo en bicicleta por la ciudad.");
        
        // Crear preferencias
        $preferencias[] = new Preferencias(1, 1, 1, 25, "M", "Cálido", "Mañana", "Verano");
        $preferencias[] = new Preferencias(2, 2, 2, 30, "F", "Templado", "Tarde", "Primavera");
        $preferencias[] = new Preferencias(3, 3, 3, 40, "M", "Cálido", "Tarde", "Verano");
        $preferencias[] = new Preferencias(4, 4, 1, 28, "F", "Cálido", "Mañana", "Verano");
        $preferencias[] = new Preferencias(5, 1, 2, 25, "M", "Cálido", "Tarde", "Verano");
        $preferencias[] = new Preferencias(6, 2, 3, 30, "F", "Templado", "Mañana", "Primavera");
        $preferencias[] = new Preferencias(7, 3, 4, 40, "M", "Cálido", "Noche", "Verano");
        $preferencias[] = new Preferencias(8, 4, 3, 28, "F", "Cálido", "Tarde", "Verano");
        $preferencias[] = new Preferencias(9, 1, 4, 25, "M", "Cálido", "Mañana", "Verano");
        $preferencias[] = new Preferencias(10, 2, 1, 30, "F", "Templado", "Tarde", "Primavera");
        $preferencias[] = new Preferencias(11, 3, 2, 40, "M", "Cálido", "Tarde", "Verano");
        $preferencias[] = new Preferencias(12, 4, 3, 28, "F", "Cálido", "Mañana", "Verano");
        $preferencias[] = new Preferencias(13, 1, 2, 25, "M", "Cálido", "Noche", "Verano");
        $preferencias[] = new Preferencias(14, 2, 4, 30, "F", "Templado", "Tarde", "Primavera");
        $preferencias[] = new Preferencias(15, 3, 1, 40, "M", "Cálido", "Tarde", "Verano");
        $preferencias[] = new Preferencias(16, 4, 3, 28, "F", "Cálido", "Mañana", "Verano");
        $preferencias[] = new Preferencias(17, 1, 4, 25, "M", "Cálido", "Mañana", "Verano");
        $preferencias[] = new Preferencias(18, 2, 3, 30, "F", "Templado", "Tarde", "Primavera");
        $preferencias[] = new Preferencias(19, 3, 2, 40, "M", "Cálido", "Tarde", "Verano");
        $preferencias[] = new Preferencias(20, 4, 1, 28, "F", "Cálido", "Mañana", "Verano");
        
        // Asignar preferencias a usuarios
        foreach ($usuarios as $usuario) {
            $usuario->preferencias = array_filter($preferencias, function($preferencia) use ($usuario) {
                return $preferencia->usuario_id == $usuario->usuario_id;
            });
        }
        
        // Recomendar actividades para un nuevo usuario
        $usuario_nuevo = new Usuario(5, "Pedro", "Ramirez", "pedro@example.com", "789456123");
        $preferencia_nueva = new Preferencias(21, 5, 4, 15, "M", "Templado", "Mañana", "Primavera");
        $usuario_nuevo->preferencias = array($preferencia_nueva);
        
        $recomendaciones = recomendar($usuario_nuevo, $usuarios);



        // obtener los sitios
        $sitios = Sitio::all();
        // obtener las empresas
        $empresas = Empresa::all();

        // Renderizar la vista     
        $router->render('paginas/recomendacion', [

            'titulo' => 'Recomendacion',
            'recomendaciones' => $recomendaciones,
            'sitios' => $sitios,
            'empresas' => $empresas,
            'usuario_nuevo' => $usuario_nuevo,
            'preferencia_nueva' => $preferencia_nueva,
            'actividades' => $actividades,
            'preferencias' => $preferencias,
            'usuarios' => $usuarios, 
        ]);
    }
}




?>
