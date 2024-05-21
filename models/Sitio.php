<?php

namespace Model;

class Sitio extends ActiveRecord{
    protected static $tabla = 'Sitios';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'categoria', 'clima', 'horario_apertura', 'horario_cierre',
    'temporada_alta', 'tarifa', 'telefono', 'email', 'redes', 'ubicacion', 'imagen', 'valoracion', 'num_opiniones'];

    public $id;
    public $nombre;
    public $descripcion;
    public $categoria;
    public $clima;
    public $horario_apertura;
    public $horario_cierre;
    public $temporada_alta;
    public $tarifa;
    public $telefono;
    public $email;
    public $redes;
    public $ubicacion;
    public $imagen;
    public $valoracion;
    public $num_opiniones;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->clima = $args['clima'] ?? '';
        $this->horario_apertura = $args['horario_apertura'] ?? '';
        $this->horario_cierre = $args['horario_cierre'] ?? '';
        $this->temporada_alta = $args['temporada_alta'] ?? '';
        $this->tarifa = $args['tarifa'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->redes = $args['redes'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->valoracion = $args['valoracion'] ?? '';
        $this->num_opiniones = $args['num_opiniones'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La descripción es Obligatoria';
        }
        // if(!$this->categoria) {
        //     self::$alertas['error'][] = 'Elige una Categoría';
        // }
        // if(!$this->clima) {
        //     self::$alertas['error'][] = 'Elige el clima del sitio';
        // }
        // if(!$this->horario_apertura) {
        //     self::$alertas['error'][] = 'Elige la hora de apertura';
        // }
        // if(!$this->horario_cierre) {
        //     self::$alertas['error'][] = 'Elige la hora de cierre';
        // }
        // if(!$this->temporada_alta) {
        //     self::$alertas['error'][] = 'Elige la temporada alta';
        // }
        // if(!$this->tarifa) {
        //     self::$alertas['error'][] = 'Elige la tarifa';
        // }
        return self::$alertas;
    }
}

