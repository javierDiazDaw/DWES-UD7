<?php 
    function getConnection(){
        $usuario = "developer";
        $pass = "developer";
        return new PDO('mysql:host=localhost;dbname=ciudades', $usuario, $pass);
    }

    function mostrar($poblacion){        
        try {      
            $db = getConnection();
            $result = $db->prepare('SELECT * FROM ciudad WHERE poblacion >= ?');
            $result->bindParam(1, $poblacion);
            $result->execute();            
            return $result->fetchAll();
        } catch (PDOException $e) {
            return false;
        }        
    }
?>