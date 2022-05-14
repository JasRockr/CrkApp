<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\PedidoController;
use Controllers\ProductoController;
use Controllers\LoginController;
use MVC\Router;
$router = new Router();


// Iniciar Sesion 
$router -> get('/', [LoginController::class, 'login']);
$router -> post('/', [LoginController::class, 'login']);
$router -> get('/logout', [LoginController::class, 'logout']);

// Recuperar Password
$router -> get('/olvide', [LoginController::class, 'olvide']);
$router -> post('/olvide', [LoginController::class, 'olvide']);
$router -> get('/recuperar', [LoginController::class, 'recuperar']);
$router -> post('/recuperar', [LoginController::class, 'recuperar']);

// Crear Cuenta 
$router -> get('/crear-cuenta', [LoginController::class, 'crear']);
$router -> post('/crear-cuenta', [LoginController::class, 'crear']);

//Confimar cuenta
$router ->  get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router ->  get('/mensaje', [LoginController::class, 'mensaje']);

//Area Privada
$router -> get('/pedido', [PedidoController::class, 'index']);
$router -> get('/admin', [AdminController::class, 'index']);

// API de Pedidos
$router -> get('/api/productos', [APIController::class, 'index']);
$router -> post('/api/pedidos', [APIController::class, 'guardar']);
$router -> post('/api/eliminar', [APIController::class, 'eliminar']);

// CRUD de Productos
$router -> get('/productos', [ProductoController::class, 'index']);
$router -> get('/productos/crear', [ProductoController::class, 'crear']);
$router -> post('/productos/crear', [ProductoController::class, 'crear']);
$router -> get('/productos/actualizar', [ProductoController::class, 'actualizar']);
$router -> post('/productos/actualizar', [ProductoController::class, 'actualizar']);
$router -> post('/productos/eliminar', [ProductoController::class, 'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();