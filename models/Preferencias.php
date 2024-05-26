<?php
namespace Model;

class Preferencias extends ActiveRecord {
    public $preferencia_id;
    public $usuario_id;
    public $actividad_id;
    public $edad;
    public $genero;
    public $clima;
    public $momento_dia;
    public $estacion;

    protected static $tabla = 'preferencias';
    protected static $columnasDB = ['preferencia_id', 'usuario_id', 'actividad_id', 'edad', 'genero', 'clima', 'momento_dia', 'estacion'];


    private static $generos = ['M' => 1, 'F' => 2];
    private static $climas = ['Soleado' => 1, 'Lluvioso' => 2, 'Nublado' => 3];
    private static $momentos_dia = ['Mañana' => 1, 'Tarde' => 2, 'Noche' => 3];
    private static $estaciones = ['Primavera' => 1, 'Verano' => 2, 'Otoño' => 3, 'Invierno' => 4];
    

    public function __construct($preferencia_id, $usuario_id, $actividad_id, $edad, $genero, $clima, $momento_dia, $estacion) {
        $this->preferencia_id = $preferencia_id ?? null;
        $this->usuario_id = $usuario_id ?? null;
        $this->actividad_id = $actividad_id ?? null;
        $this->edad = $edad ?? null;

        $this->genero = self::$generos[$genero] ?? null;
        $this->clima = self::$climas[$clima] ?? null;
        $this->momento_dia = self::$momentos_dia[$momento_dia] ?? null;
        $this->estacion = self::$estaciones[$estacion] ?? null;

    }
}
?>