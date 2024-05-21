<?php
namespace Model;

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
?>