<!DOCTYPE html>
<html>

<head>
    <title>Calcular Par o Impar - Servicio Web + PHP + SOAP</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php 
    
    $error = "";
    $resultado = "";    

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://localhost/DWES-UD7/ejercicio2/parImpar.php";
    $uri = "http://localhost/DWES-UD7/ejercicio2";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['num'])) {
            $n1 = $_POST['num'];            
            // Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php
            $resultado = $cliente->parImpar($n1);
        } else {
            $error = "<strong>Error:</strong> Debes introducir un número<br/><br/>";
        }
    } 
    ?>
    <h1>Número par o impar</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="index.php" method="post">
        <?php
        print "<input type='text' name='num'>";        
        print "<input type='submit' name='enviar' value='Calcular'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>
    
</body>

</html>