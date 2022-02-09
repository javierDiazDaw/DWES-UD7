<!DOCTYPE html>
<html>

<head>
    <title>Calcular Letra DNI - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN
    // Vaciamos algunas variables
    $error = "";
    $resultado = "";
    $dni = "";

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://localhost/servidor.php";
    $uri = "http://localhost/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['n1']) && (!empty($_POST['n2'])>0)) {
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
            $resultado = "La suma es: " . $cliente->suma($n1, $n2);
        } else {
            $error = "<strong>Error:</strong> Debes introducir dos numeros<br/><br/>";
        }
    }
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
    
</body>

</html>