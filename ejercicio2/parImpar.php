<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.45/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("parImpar");
$server->handle();

// Función para obtener raíz cuadrada
function parImpar($n1) {

    if ($n1%2==0){
        return "el $n1 es par";
    }else{
        return "el $n1 es impar";
    }
    
}
?>