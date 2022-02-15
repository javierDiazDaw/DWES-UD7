<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";



$wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

//Basados en la estructura del servicio armamos un array


//Enviamos el Request


if (isset($_POST['enviar'])) {
    $params = array(
        "id" => $_POST['id'],
    );

    $options = array(
        "uri" => $wsdl,
        "style" => SOAP_RPC,
        "use" => SOAP_ENCODED,
        "soap_version" => SOAP_1_1,
        "cache_wsdl" => WSDL_CACHE_BOTH,
        "connection_timeout" => 15,
        "trace" => false,
        "encoding" => "UTF-8",
        "exceptions" => false,
    );

    $cliente = new SoapClient($wsdl, $options);

    // Establecemos los parámetros de envío
    if (!empty($_POST['id'])) {
        // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
        $result = $cliente->FindPerson($params);
    } else {
        $error = "<strong>Error:</strong> Debes introducir un numero<br/><br/>Ej: 45678987";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Calcular Letra DNI - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <h1>Buscar datos de la persona</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="FindPerson.php" method="post">
        <?php
        print "<input type='text' name='id'>";
        print "<input type='submit' name='enviar' value='Buscar'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>";
        
        if (isset($_POST['enviar'])) {
            foreach ($result as $p) {
                echo $p->Name . "<br>";
                echo $p->SSN . "<br>";
                echo $p->DOB . "<br>";

                $home = $p->Home; 
                echo "Home:";
                echo $home->Street . "<br>";
                echo $home->City . "<br>";
                echo $home->State . "<br>";
                echo $home->Zip . "<br>";

                $office = $p->Office;
                echo "Office:";
                echo $office->Street . "<br>";
                echo $office->City . "<br>";
                echo $office->State . "<br>";
                echo $office->Zip . "<br>";

                echo "Color:";
                echo $p->FavoriteColors->FavoriteColorsItem . "<br>";
            }
        }
        echo "</p>";
        ?>
    </form>
   
</body>

</html>