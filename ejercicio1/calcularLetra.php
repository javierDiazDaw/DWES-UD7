<?php
// Instanciamos un nuevo servidor SOAP
$uri="http://localhost/DWES-UD7/ejercicio1";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("suma");
$server->handle();

//Función suma
function suma($n1,$n2) {
    $resultado=$n1 + $n2;
    return $resultado;
}
?>