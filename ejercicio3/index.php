<!DOCTYPE html>
<html>

<head>
    <title>mostrar ciudades</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php 
    
    $error = "";
    $resultado = [];    

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://localhost/DWES-UD7/ejercicio3/mostrar.php";
    $uri = "http://localhost/DWES-UD7/ejercicio3";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['poblacion'])) {                       
            
            $poblacion = (int) $_POST['poblacion'];
            
            $resultado =  $cliente->mostrar($poblacion);            
            
        } else {
            $error = "<strong>Error:</strong> Debes introducir datos numéricos<br/><br/>";
        }
    }
    ?>
    <h1>Obtener ciudad por su población</h1>    
    <form action="index.php" method="post">
        <?php 
        print "<input type='number' name='poblacion'>";        
        print "<input type='submit' name='enviar' value='Mostrar'>";
        print "<p class='error'>$error</p>";    
        
        foreach($resultado as $ciudad){                

            "<p>" . print $ciudad['nombre'] . "</p>";
        }
        
        ?>
    </form>
</body>

</html>