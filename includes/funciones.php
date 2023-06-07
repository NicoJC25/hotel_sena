<?php
//1. Consultar una tabla de la base de datos
//Crear la función gestionar_bd()

function obtener_clientes(){

    //TRY-CATCH se usa para vigilar un codigo en caso de error:
    //En TRY viene la ejecución que se vigila, en caso de error se ejecuta el CATCH
    try{
        //1. Usar las credenciales de conexión     
        require 'database.php';
        
        //2. Escribir la consulta o query SQL
        $sql = "SELECT * FROM clientes;";

        //Hacer la consulta
        $consulta = mysqli_query($db, $sql);

        return $consulta;

        //3. Acceder a los resultados      
        //El cierre es opcional. PHP cierra la conexión al final si está abierta
        mysqli_close($db);
    }
    //Catch se usa en complemento con try
    
    catch(\Throwable $th){
        echo('<pre>');
        var_dump($th);
        echo('</pre>');
    }
}

//2. Conectar a una base de datos
//Credenciales de base de datos

function conectar_db(){

    $db = mysqli_connect('localhost', 'root', '', 'hotel');

    if(!$db){
        'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
}

