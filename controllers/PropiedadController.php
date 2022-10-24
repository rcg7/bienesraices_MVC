<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;

class PropiedadController {
    public static function index(Router $router) {

        $propiedades = Propiedad::all();

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades
        ]);
    }
    public static function crear() {
        echo "Crear Propiedad";
    }
    public static function actualizar() {
        echo "Actualizar Propiedad";
    }
}