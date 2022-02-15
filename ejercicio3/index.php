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
            
            $p = (int) $_POST['poblacion'];
            
            $resultado =  $cliente->mostrar($p);            
            
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
        
        echo "<table border = '1'>";
            echo "<tr>";
                echo "<th>";
                    echo "Ciudad";
                echo "</th>";
                echo "<th>";
                    echo "Poblacion";
                echo "</th>";
            echo "</tr>";   


        foreach($resultado as $ciudad){                
            echo "<tr>";   
                echo "<td>";
                echo $ciudad['nombre'];
                echo "</td>";
                echo "<td>";
                echo $ciudad['poblacion'];
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        ?>
    </form>
</body>

</html>