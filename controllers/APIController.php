<?php

namespace Controllers;

use Model\Pedido;
use Model\PedidoProducto;
use Model\Producto;

class APIController {
    public static function index() {
        $productos = Producto::all();
        echo json_encode($productos);
        //debuguear($productos);
    }

    public static function guardar() {
        
        // Guarda el pedido y devuelve el ID
        $pedido = new Pedido($_POST);
        $resultado = $pedido->guardar();
        //echo json_encode($resultado);
        
        //debuguear($pedido);
        $id = $resultado['id'];
        
        // Guarda los Productos con ID del pedido
        $idProductos = explode(",",$_POST['productos']);
        foreach($idProductos as $idProducto) { 
            $args = [
                'pedidoId' => $id, 
                'productoId' => $idProducto
            ];
            $pedidoProdcuto = new PedidoProducto($args);
            $pedidoProdcuto->guardar();
        }
        // Retorna la respuesta
        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $pedido = Pedido::find($id);
            $pedido->eliminar();
            header('Location:' .  $_SERVER['HTTP_REFERER']);
        }
    }
}