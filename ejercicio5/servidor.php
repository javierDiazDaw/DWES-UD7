<?php
define("DEBUG", TRUE);

if(DEBUG)
{
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array
$params = Array(
    "Arg1" => $_POST['n1'],
    "Arg2" => $_POST['n1']
    );

$options = Array(
	"uri"=> $wsdl,
	"style"=> SOAP_RPC,
	"use"=> SOAP_ENCODED,
	"soap_version"=> SOAP_1_1,
	"cache_wsdl"=> WSDL_CACHE_BOTH,
	"connection_timeout" => 15,
	"trace" => false,
	"encoding" => "UTF-8",
	"exceptions" => false,
	);

//Enviamos el Request
$soap = new SoapClient($wsdl, $options);
$result = $soap->AddInteger($params); //Aquí cambiamos dependiendo de la acción del servicio que necesitemos ejecutar
var_dump($result);
?>

<h1>Obtener letra DNI</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
        <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
        print "<input type='text' name='n1'>";
        print "<input type='text' name='n2'>";
        print "<input type='submit' name='enviar' value='Calcular'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>