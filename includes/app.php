<?php 
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';


// Conectarnos a la base de datos

function ConectarDB(){
    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_DB']);

    if(!$db){
        echo 'Error no se puede conectar';
        exit;
    }
    return $db;
}

$db = ConectarDB();

use Model\ActiveRecord;
ActiveRecord::setDB($db);