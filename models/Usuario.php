<?php
namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['usuario_id', 'nombre', 'apellido', 'email', 'password', 'confirmado', 'token', 'admin', 'preferencias'];

    public $usuario_id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $confirmado;
    public $token;
    public $admin;
    public $preferencias;

    public $password_actual;
    public $password_nuevo;

        // Definir un array de clave-valor para cada opción

    public function __construct($args = [])
    {
        $this->usuario_id = $args['usuario_id'] ?? $args['usuario_id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['contrasena'] ?? $args['password'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->preferencias = isset($datos['preferencias']) ? $datos['preferencias'] : [];
    }
}
?>