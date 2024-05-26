<?php
namespace Model;

class Actividad extends ActiveRecord{
    protected static $tabla = 'actividades';
    protected static $columnasDB = ['actividad_id', 'nombre', 'descripcion'];

    public $actividad_id;
    public $nombre;
    public $descripcion;

    public function __construct($actividad_id=null, $nombre=null, $descripcion=null) {
        $this->actividad_id = $actividad_id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
}
?>
