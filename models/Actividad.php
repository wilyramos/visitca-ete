<?php
namespace Model;

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