<?php

namespace Controllers;

use Model\AdminPedido;
use MVC\Router;

class AdminController {
    public static function index( Router $router) {
        session_start();
        isAdmin();

        // Validacion de fecha seleccionada o fecha del sistema
        $fecha =  $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-', $fecha);
        
        if( !checkdate($fechas[1], $fechas[2], $fechas[0]) ) {
            header('Location: /404');
        }

        //Consultar la base de datos
        $consulta = "SELECT ped.id, ped.hora, CONCAT(usr.nombre,' ',usr.apellido) AS cliente, ";
        $consulta .= " usr.email, usr.telefono, pro.nombre AS producto, pro.precio ";
        $consulta .= " FROM pedidos AS ped ";
        $consulta .= " LEFT OUTER JOIN usuarios AS usr ON ped.usuarioId = usr.id ";
        $consulta .= " LEFT OUTER JOIN pedidosProductos AS pep ON pep.pedidoId = ped.id";
        $consulta .= " LEFT OUTER JOIN productos AS pro ON pro.id = pep.productoId";
        $consulta .= " WHERE ped.fecha = '${fecha}' ";

        $pedidos = AdminPedido::SQL($consulta);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'pedidos' => $pedidos,
            'fecha' => $fecha
        ]);
    }
}