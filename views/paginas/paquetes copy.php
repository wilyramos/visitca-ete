<main class="paquetes">
    <h2 class="paquetes__heading"><?php echo $titulo ?></h2>
    <p class="paquetes__descripcion"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>


<?php

    class Usuario {
        public $usuario_id;
        public $nombre;
        public $apellido;
        public $email;
        public $contrasena;
        public $preferencias;

        public function __construct($usuario_id, $nombre, $apellido, $email, $contrasena) {
            $this->usuario_id = $usuario_id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
            $this->contrasena = $contrasena;
            $this->preferencias = array();
        }
    }

    class Actividad {
        public $actividad_id;
        public $nombre;
        public $descripcion;

        public function __construct($actividad_id, $nombre, $descripcion) {
            $this->actividad_id = $actividad_id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }
    }

    class Preferencias {
        public $preferencia_id;
        public $usuario_id;
        public $actividad_id;
        public $edad;
        public $genero;
        public $clima;
        public $momento_dia;
        public $estacion;

        public function __construct($preferencia_id, $usuario_id, $actividad_id, $edad, $genero, $clima, $momento_dia, $estacion) {
            $this->preferencia_id = $preferencia_id;
            $this->usuario_id = $usuario_id;
            $this->actividad_id = $actividad_id;
            $this->edad = $edad;
            $this->genero = $genero;
            $this->clima = $clima;
            $this->momento_dia = $momento_dia;
            $this->estacion = $estacion;
        }
    }

    function similitud_cos($v1, $v2) {
        $sum_xy = 0;
        $sum_x_sq = 0;
        $sum_y_sq = 0;

        for ($i = 0; $i < count($v1); $i++) {
            $sum_xy += $v1[$i] * $v2[$i];
            $sum_x_sq += $v1[$i] ** 2;
            $sum_y_sq += $v2[$i] ** 2;
        }

        if ($sum_x_sq == 0 || $sum_y_sq == 0) {
            return 0;
        } else {
            return $sum_xy / (sqrt($sum_x_sq) * sqrt($sum_y_sq));
        }
    }

    function recomendar($usuario_nuevo, $usuarios, $umbral_similitud = 0.5) {
        $preferencias_usuario_nuevo = $usuario_nuevo->preferencias;
        $similitudes = array();

        foreach ($usuarios as $usuario) {
            if ($usuario !== $usuario_nuevo) {
                $preferencias_usuario = $usuario->preferencias;
                $similitud = similitud_cos(
                    array_map(function($preferencia_usuario_nuevo) {
                        return $preferencia_usuario_nuevo->actividad_id;
                    }, $preferencias_usuario_nuevo),
                    array_map(function($preferencia_usuario) {
                        return $preferencia_usuario->actividad_id;
                    }, $preferencias_usuario)
                );
                if ($similitud >= $umbral_similitud) {
                    $similitudes[$usuario->usuario_id] = $similitud; // Cambio aquí
                }
            }
        }

        $recomendaciones = array();
        foreach ($similitudes as $usuario_id => $similitud) { // Cambio aquí
            foreach ($usuarios[$usuario_id - 1]->preferencias as $preferencia_usuario) { // Cambio aquí
                if (!in_array($preferencia_usuario->actividad_id, array_map(function($preferencia_usuario_nuevo) {
                    return $preferencia_usuario_nuevo->actividad_id;
                }, $preferencias_usuario_nuevo))) {
                    if (!isset($recomendaciones[$preferencia_usuario->actividad_id])) {
                        $recomendaciones[$preferencia_usuario->actividad_id] = array($preferencia_usuario, $similitud);
                    } else {
                        $recomendaciones[$preferencia_usuario->actividad_id][1] += $similitud;
                    }
                }
            }
        }

        uasort($recomendaciones, function($a, $b) {
            return $b[1] - $a[1];
        });

        return array_slice($recomendaciones, 0, 5);
    }

    // Definir usuarios, actividades y preferencias
    $usuarios = array();
    $sitios_turisticos = array();
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
    $preferencia_nueva = new Preferencias(21, 5, 3, 35, "M", "Cálido", "Tarde", "Verano");


    $usuario_nuevo2 = new Usuario(6, "Luis", "Gonzalez", "luis@example.com", "789456");
    $preferencia_nueva2 = new Preferencias(22, 6, 4, 35, "M", "Templado", "Tarde", "Primavera");

    $usuario_nuevo2->preferencias = array($preferencia_nueva2);

    echo "<pre>";
    print_r($usuario_nuevo2);
    echo "</pre>";

    $usuario_nuevo->preferencias = array($preferencia_nueva);

    $recomendaciones = recomendar($usuario_nuevo, $usuarios);

    foreach ($recomendaciones as $actividad_id => list($preferencia, $similitud)) {
        echo '<div class="actividad">';
        echo '<h3>Actividad: ' . $actividades[$actividad_id - 1]->nombre . '</h3>';
        echo '<p>Descripción: ' . $actividades[$actividad_id - 1]->descripcion . '</p>';
        echo '<p>Preferencia del usuario que la recomienda:</p>';
        echo '<ul>';
        echo '<li>Usuario: ' . $preferencia->usuario_id . '</li>';
        echo '<li>Edad: ' . $preferencia->edad . '</li>';
        echo '<li>Género: ' . $preferencia->genero . '</li>';
        echo '<li>Clima: ' . $preferencia->clima . '</li>';
        echo '<li>Momento del día: ' . $preferencia->momento_dia . '</li>';
        echo '<li>Estación: ' . $preferencia->estacion . '</li>';
        echo '</ul>';
        echo '<p>Similitud con el usuario nuevo: ' . $similitud . '</p>';
        echo '</div>';
    }
?>

</main>