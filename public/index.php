<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

use Controllers\PropiedadController;

$router = new Router();


$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', 'funcion_tienda');
$router->get('/propiedades/actualizar', 'funcion_contacto');


$router->comprobarRutas();