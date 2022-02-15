<!DOCTYPE html>
<html>

<head>
    <title>Calcular Letra DNI - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php
    $error = "";
    $resultado = "";    

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap


    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {

        $params = array(
            "Arg1" => $_POST['num1'],
            "Arg2" => $_POST['num2']
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

        if (!empty($_POST['num1']) && !empty($_POST['num2'])){

            $resultado = $cliente->DivideInteger($params)->DivideIntegerResult;
        } else {
            $error = "<strong>Error:</strong> Debes introducir dos numeros<br/><br/>";
        }
    }
    ?>
    <h1>División</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="DivideInteger.php" method="post">
        <?php
        print "<input type='number' name='num1'>";
        print "<input type='number' name='num2'>";
        print "<input type='submit' name='enviar' value='Calcular'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>
</body>

</html>