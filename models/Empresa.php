<?php

namespace Model;


class Empresa extends ActiveRecord{

    protected static $tabla = 'Empresas';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'direccion', 'ciudad', 'telefono', 'email', 
    'sitio_web', 'facebook', 'instagram', 'categoria', 'horario_apertura', 'horario_cierre', 'imagen', 'valoracion','num_opiniones', 'latitud', 'longitud'];
    

    // Constructor

    public $id;
    public $nombre;
    public $descripcion;
    public $direccion;
    public $ciudad;
    public $telefono;
    public $email;
    public $sitio_web;
    public $facebook;
    public $instagram;
    public $categoria;
    public $horario_apertura;
    public $horario_cierre;
    public $imagen;
    public $valoracion;
    public $num_opiniones;
    public $latitud;
    public $longitud;
    

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->sitio_web = $args['sitio_web'] ?? '';
        $this->facebook = $args['facebook'] ?? '';
        $this->instagram = $args['instagram'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->horario_apertura = $args['horario_apertura'] ?? '';
        $this->horario_cierre = $args['horario_cierre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->valoracion = $args['valoracion'] ?? '';
        $this->num_opiniones = $args['num_opiniones'] ?? '';
        $this->latitud = $args['latitud'] ?? '';
        $this->longitud = $args['longitud'] ?? '';
    }

}