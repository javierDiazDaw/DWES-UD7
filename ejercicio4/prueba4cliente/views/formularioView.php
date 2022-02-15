<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
<h1>Obtener ciudad por su población</h1>    
    <form action="index.php?controller=ciudades&action=formulario" method="post">
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
    