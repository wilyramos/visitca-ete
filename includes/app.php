<?php 

use Dotenv\Dotenv; // variables de entorno
use Model\ActiveRecord; // importa el active record 
require __DIR__ . '/../vendor/autoload.php'; // composer

// Añadir Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
ActiveRecord::setDB($db);