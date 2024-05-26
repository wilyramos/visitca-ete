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

        
        $usuarios[] = new Usuario([
            'usuario_id' => 1,
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'email' => 'juan@perez.com',
            'contrasena' => '123456',
            'confirmado' => 1,
            'token' =>'',
            'admin' => 1,
        ]);

        $usuarios[] = new Usuario([
            'usuario_id' => 2,
            'nombre' => 'Maria',
            'apellido' => 'Gomez',
            'email' => 'correo@com',
            'contrasena' => '123456',
            'confirmado' => 1,
            'token' =>'',
            'admin' => 1,
            'preferencias' => []
        ]);

        $usuarios[] = new Usuario([
            'usuario_id' => 3,
            'nombre' => 'Pedro',
            'apellido' => 'Rodriguez',
            'email' => 'pedro@rodri.com',
            'contrasena' => '123456',
            'confirmado' => 1,
            'token' =>'',
            'admin' => 1,
            'preferencias' => []
        ]);

        $usuarios[] = new Usuario([
            'usuario_id' => 4,
            'nombre' => 'Ana',
            'apellido' => 'Lopez',
            'email' => 'correofsd@correo.com',
            'contrasena' => '123456',
            'confirmado' => 1,
            'token' =>'',
            'admin' => 1,
            'preferencias' => []
        ]);

        $usuarios[] = new Usuario([
            'usuario_id' => 5,
            'nombre' => 'Carlos',
            'apellido' => 'Gonzalez',
            'email' => 'carlos@correo.com',
            'contrasena' => '123456',
            'confirmado' => 1,
            'token' =>'',
            'admin' => 1,
            'preferencias' => []
        ]);

        $usuarios[] = new Usuario([
            'usuario_id' => 6,
            'nombre' => 'Lucia',
            'apellido' => 'Garcia',
            'email' => 'lucia@correo.com',
            'contrasena' => '123456',
            'confirmado' => 1,
            'token' =>'',
            'admin' => 1,
            'preferencias' => []
        ]);

        // Crear Acitivdad como categorias con id, nombre, descripcion

        $actividades[] = new Actividad(1, 'Museo', 'Visita a museo');
        $actividades[] = new Actividad(2, 'Parque', 'Visita a parque');
        $actividades[] = new Actividad(3, 'Playa', 'Visita a playa');
        $actividades[] = new Actividad(4, 'Senderismo', 'Caminata en la naturaleza');
        $actividades[] = new Actividad(5, 'Cine', 'Visita a cine');
        $actividades[] = new Actividad(6, 'Teatro', 'Visita a teatro');
        $actividades[] = new Actividad(7, 'Restaurante', 'Visita a restaurante');
        $actividades[] = new Actividad(8, 'Bar', 'Visita a bar');
        $actividades[] = new Actividad(9, 'Discoteca', 'Visita a discoteca');
        $actividades[] = new Actividad(10, 'Centro comercial', 'Visita a centro comercial');

        
        

        //crear las preferencias de los usuarios
        $usuarios[0]->preferencias = new Preferencias(1, 1, 1, 25, "M", "Cálido", "Mañana", "Verano");
        
        $usuarios[1]->preferencias = new Preferencias(2, 2, 2, 30, "F", "Templado", "Tarde", "Primavera");

        $usuarios[2]->preferencias = new Preferencias(3, 3, 3, 40, "M", "Cálido", "Tarde", "Verano");

        $usuarios[3]->preferencias = new Preferencias(4, 4, 1, 28, "F", "Cálido", "Mañana", "Verano");

        $usuarios[4]->preferencias = new Preferencias(5, 5, 2, 35, "M", "Cálido", "Tarde", "Verano");

        $usuarios[5]->preferencias = new Preferencias(6, 6, 3, 45, "F", "Cálido", "Mañana", "Verano");


        $usuario_nuevo = new Usuario(
            [
                'usuario_id' => 5,
                'nombre' => 'Carlos',
                'apellido' => 'Gonzalez',
                'email' => 'Carlitos@correo.com',
                'contrasena' => '123456',
                'confirmado' => 1,
                'token' =>'',
                'admin' => 1
                 
            ]
        );

        $usuario_nuevo->preferencias = new Preferencias(21, 5, 1, 25, "M", "Cálido", "Mañana", "Verano");

        // obtener los sitios
        $sitios = Sitio::all();
        // obtener las empresas
        $empresas = Empresa::all();

        $recomendaciones = recomendar($usuario_nuevo, $usuarios);
        // echo ("Para el usuario nuevo: " . $usuario_nuevo->nombre . " " . $usuario_nuevo->apellido . "<br>");
        // foreach ($recomendaciones as $usuario => $recomendacion) {
        //     echo "Usuario: {$usuario}, Similitud: {$recomendacion['similitud']}<br>";
        // }


        // Renderizar la vista     
        $router->render('paginas/recomendacion', [

            'titulo' => 'Recomendacion',
            'recomendaciones' => $recomendaciones,
            'sitios' => $sitios,
            'empresas' => $empresas,
            'usuario_nuevo' => $usuario_nuevo,
            'actividades' => $actividades,
            'preferencias' => $preferencias,
            'usuarios' => $usuarios, 
        ]);
    }
}


?>
