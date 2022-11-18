<?php

namespace Controllers;
use MVC\Router;
use MVC\Admin;

class LoginController {
    public static function login(Router $router) {

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $aut = new Admin($_POST);

            $errores = $aut->validar();

            if(empty($errores)) {

                // Verificar si el usuario existe
                $resultado = $aut->existeUsuario();

                if(!$resultado) {
                // Verificar si el usuario existe o no ( mensaje de error)
                    $errores = Admin::getErrores();

                } else {
                // Verificar el password
                    $autenticado = $aut->comprobarPassword($resultado);

                    if($autenticado) {
                    // Autenticar al usuario
                        $auth->autenticar();

                    } else {
                        // Password incorrecto ( mensaje de error)
                        $errores = Admin::getErrores();
                    }



                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores 
        ]);
    }
    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}


?>