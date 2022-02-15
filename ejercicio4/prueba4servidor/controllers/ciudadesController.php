<?php 

    function controllerServidor(){

        require 'models/ciudadesModel.php';

        $uri="http://localhost/DWES-UD7/ejercicio4/prueba4servidor";
        $server = new SoapServer(null,array('uri'=>$uri));
        $server->addFunction("mostrar");
        $server->handle();        
    }
?>