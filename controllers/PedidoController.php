<?php

namespace Controllers;

use MVC\Router;

class PedidoController {
    public static function index(Router $router) {

        if(!$_SESSION['id']) {
            session_start();
        }
        //debuguear($_SESSION);

        isAuth();
        
        $router->render('pedido/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);

    }
}

?>