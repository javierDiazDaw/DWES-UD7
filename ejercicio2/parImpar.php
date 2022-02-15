<?php 
// Instanciamos un nuevo servidor SOAP
$uri="http://localhost/DWES-UD7/ejercicio2";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("parImpar");
$server->handle();

// Función para obtener el resultado si es par o impar
function parImpar($n) {

    if ($n%2==0){
        return "el $n es par";
    }else{
        return "el $n es impar";
    }
    
}
?>