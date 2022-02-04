<?php

function getConnection(){
    $usuario = "developer";
    $pass = "developer";
    return new PDO('mysql:host=localhost;dbname=ciudades', $usuario, $pass);
}


function obtenerCiudades(){
    try {    
        $db = getConnection();
        $consulta = $db->prepare("SELECT * FROM ciudad"); 
        $consulta->execute(); 
        $array = [];
        while($fila = $consulta->fetch(PDO::FETCH_BOTH)){
            $array[]=$fila;
        }
        return $array;            
    } catch (PDOException $e) {
        return false;
    }        
}
