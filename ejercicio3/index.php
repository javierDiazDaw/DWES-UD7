<!DOCTYPE html>
<html>

<head>
    <title>mostrar ciudades</title>
    <link rel="stylesheet" type="text/css" href="/estilo.css">
</head>

<body>
    <?php 
    
    $error = "";
    $resultado = "";
    $dato = "";

    // Iniciamos el cliente SOAP
    // Escribimos la dirección donde se encuentra el servicio
    $url = "http://192.168.129.70/mostrar.php";
    $uri = "http://192.168.129.70/";
    $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

    // Ejecutamos las siguientes líneas al enviar el formulario
    if (isset($_POST['enviar'])) {
        // Establecemos los parámetros de envío
        if (!empty($_POST['dato'])) {
            $dato = $_POST['dato'];            
            
            $dato =  $cliente->mostrar($dato);            

        } else {
            $error = "<strong>Error:</strong> Debes introducir datos numéricos<br/><br/>";
        }
    }
    ?>
    <h1>Obtener poblacion</h1>    
    <form action="index.php" method="post">
        <?php 
        print "<input type='text' name='dato'>";        
        print "<input type='submit' name='enviar' value='Mostrar'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
        ?>
    </form>  
    
    <table border="1">
        <thead>
            <tr>                
                <th>Nombre</th>
                <th>Poblacion</th>                
            </tr>
        </thead>
        <tbody>
           
           <?php
                  
                echo "<tr>";
                    echo "<td>";
                    echo $dato["nombre"];
                    echo "</td>";
                    echo "<td>";
                    echo $dato["poblacion"];
                    echo "</td>";                    
                echo"</tr>";            
           ?>
        </tbody>
    </table>
    
</body>

</html>