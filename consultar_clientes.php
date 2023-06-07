<?php
 require 'includes/funciones.php';

 $consulta = obtener_clientes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel SENA</title>
    
</head>

<body>
   
    <p>Hotel SENA - Administración de habitaciones</p>
   
    <?php
        
    while($cliente = mysqli_fetch_assoc($consulta)){
            echo $cliente['id'].$cliente['nombres'].$cliente['primer_apellido'].$cliente['correo'].'<br>';
    }
        
    ?>

    <a href="admin/habitacion/crear.php">Crear habitacion</a>

