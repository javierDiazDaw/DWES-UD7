<?php 

$uri="http://192.168.129.45/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("mostrar");
$server->handle();

function mostrar($dato){


    $dato = obtenerCiudad($dato);

    // if ($dato>=1000){
    //     return "el $dato es par";
    // }else{
    //     return "el $dato es impar";
    // }
    
}
?>