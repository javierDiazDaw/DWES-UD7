<?php
    //la carpeta donde buscamos los controladores
    define ('CONTROLLERS_FOLDER', "controllers/");
    //si no se indica un controlador, este es el controlador que se usará
    define ('DEFAULT_CONTROLLER', "ciudades");
    //si no se indica una accion, esta accion es la que se usará
    define ('DEFAULT_ACTION', 'formulario');  

    $controller = DEFAULT_CONTROLLER;
    if (!empty($_GET['controller'])) {
        $controller = $_GET ['controller'];
    }

    $action = DEFAULT_ACTION;
    if (!empty($_GET['action'])) {
        $action = $_GET ['action'];
    }

    $controller = CONTROLLERS_FOLDER . $controller . 'Controller.php';

    try {
        if (is_file($controller)) {
            require_once ($controller);
        }else{
            throw new Exception ('El controlador no existe - 404 not found');
        }

        if (is_callable($action)) {
            $action();
        }else{
            throw new Exception ('La accion no existe - 404 not found');
        }

    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    }

    //require 'controllers/librosController.php';
?>