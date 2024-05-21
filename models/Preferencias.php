<?php
namespace Model;

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
