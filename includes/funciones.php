<?php

function debuguear($variable) : string {
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}


function pagina_actual($path) :bool{
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}


// verificar si el admin esta autenticado
function is_auth() : bool{
    if(!isset($_SESSION)){
        session_start();
    }
    return isset ($_SESSION['nombre']) && !empty($_SESSION);
}

function is_admin() : bool{
    if(!isset($_SESSION)){
        session_start();
    }
    return isset ($_SESSION['nombre']) && !empty($_SESSION['admin']);
}

function aos_animacion() : void {
    $efectos = ['fade-up', 'fade-down', 'fade-left', 'fade-right', 'flip-left', 'flip-right', 'zoom-in', 'zoom-in-up', 'zoom-in-down', 'zoom-out'];
    $efecto = array_rand($efectos, 1);
    echo ' data-aos="' . $efectos[$efecto] . '" ';
}


// funciones para reomcnedacion


function similitud_cos($v1, $v2) {
    // Función para calcular la similitud coseno entre dos vectores
    $dot_product = 0;
    $norm_v1 = 0;
    $norm_v2 = 0;

    // Ignorar los primeros tres elementos de cada vector
    $v1 = array_slice($v1, 3);
    $v2 = array_slice($v2, 3);

    foreach ($v1 as $key => $value) {
        $dot_product += $v1[$key] * $v2[$key];
        $norm_v1 += pow($v1[$key], 2);
        $norm_v2 += pow($v2[$key], 2);
    }

    $similarity = $dot_product / (sqrt($norm_v1) * sqrt($norm_v2));
    return $similarity;
}


function recomendar($usuario_nuevo, $usuarios) {
    $recomendaciones = [];

    foreach ($usuarios as $usuario) {
        if ($usuario->nombre !== $usuario_nuevo->nombre) {
            $similitud = similitud_cos(get_object_vars($usuario->preferencias), get_object_vars($usuario_nuevo->preferencias));
           
            // echo "Similitud entre {$usuario_nuevo->nombre} y {$usuario->nombre}: $similitud<br>";
            
            // almacenar los resultados el usuario y el resultado de la similitud
            $recomendaciones[$usuario->nombre] = [
                'usuario' => $usuario,
                'similitud' => $similitud
            ];   
        }
        // ordenera los resultados de mayor a menor tomando en cuenta la similitud
        uasort($recomendaciones, function($a, $b) {
            return $b['similitud'] <=> $a['similitud'];
        });      
    }
    return $recomendaciones;
}

