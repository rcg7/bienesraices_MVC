<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class PropiedadController {
    public static function crea( Router $router) {

        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
        
            //Validar que no haya campos vacios
            $errores = $vendedor->validar();
        
            // No hay errores
            if(empty($errores)) {
            $vendedor->guardar();
            }
         }
        
        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar( Router $router) {

        $errores = Vendedor::getErrores();

        $id = validarORedireccionar('/admin');

        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los Valores
            $args = $_POST['vendedor'];
        
            // Sincronizar el objeto en memoria con lo que el usuario escribió
            $vendedores->sincronizar($args);
        
            // Validación
            $errores = $vendedores->validar();
        
            if(empty($errores)) {
                $vendedores->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar() {
      if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validar Id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            // Valida el tipo a eliminar
            $tipo = $_POST['tipo'];

            if(validarTipoContenido($tipo)) {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }

      }
    }
}