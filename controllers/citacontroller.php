<?php

namespace Controllers;

use MVC\Router;

class CItaController {
    public static function index (Router $router){
        session_start();

        isAuth();

        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}

?>