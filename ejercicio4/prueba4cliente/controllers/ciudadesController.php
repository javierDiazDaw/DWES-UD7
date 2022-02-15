<?php

    function formulario(){
        $error = "";
        $resultado = [];    

        // Iniciamos el cliente SOAP
        // Escribimos la dirección donde se encuentra el servicio
        $url = "http://localhost/DWES-UD7/ejercicio4/prueba4servidor/index.php?controller=ciudades&action=controllerServidor";
        $uri = "http://localhost/DWES-UD7/ejercici4/prueba4servidor/";
        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

        // Ejecutamos las siguientes líneas al enviar el formulario
        if (isset($_POST['enviar'])) {
            // Establecemos los parámetros de envío
            if (!empty($_POST['poblacion'])) {                       
                
                $p = (int) $_POST['poblacion'];
                
                $resultado =  $cliente->mostrar($p);            
                
            } else {
                $error = "<strong>Error:</strong> Debes introducir datos numéricos<br/><br/>";
            }
        }

        include 'views/formularioView.php';

    }
