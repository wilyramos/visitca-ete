<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
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


function similitud_cos($vector1, $vector2) {
    $sum_xy = 0;
    $sum_x_sq = 0;
    $sum_y_sq = 0;

    for ($i = 0; $i < count($vector1); $i++) {
        $sum_xy += $vector1[$i] * $vector2[$i];
        $sum_x_sq += $vector1[$i] ** 2;
        $sum_y_sq += $vector2[$i] ** 2;
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
                array_map(function($preferencia) {
                    return $preferencia->actividad_id;
                }, $preferencias_usuario_nuevo),
                array_map(function($preferencia) {
                    return $preferencia->actividad_id;
                }, $preferencias_usuario)
            );
            if ($similitud >= $umbral_similitud) {
                $similitudes[$usuario->usuario_id] = $similitud;
            }
        }
    }

    $recomendaciones = array();
    foreach ($similitudes as $usuario_id => $similitud) {
        foreach ($usuarios[$usuario_id - 1]->preferencias as $preferencia_usuario) {
            if (!in_array($preferencia_usuario->actividad_id, array_map(function($preferencia) {
                return $preferencia->actividad_id;
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


