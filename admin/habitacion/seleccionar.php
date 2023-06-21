<?php

require '../../includes/funciones.php';

$bd = conectar_db();


$consulta = "SELECT * FROM habitacion ORDER BY nro_hab;";


$resultado_consulta = mysqli_query($bd, $consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <title>Habitaciones</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../../estilos/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

    </head>
</head>
<body>
<h4>Gestion de habitaciones - Consultar</h4>  
<a href="../../index.php"><input type="button" id="regresar" name="regresar" value="Regresar"></a>
<table>
    <th>
        <tr>
            <td>Numero de habitacion</td>
            <td>Estado de la habitacion</td>
            <td>Descripcion de la habitacion</td>
            <td>ID de tipo de habitacion</td>
        </tr> 
    </th>
    <?php 
    

    ?>
    <?php while($habitacion = mysqli_fetch_assoc($resultado_consulta)){?>
    <tr>
        <td> <?php echo $habitacion['nro_hab'];?> </td>
        <td> <?php echo $habitacion['estado'];?> </td>
        <td> <?php echo $habitacion['descripcion'];?> </td>
        <td> <?php echo $habitacion['id_tipo_h'];?></td>
        <td>
        <td><a href="eliminar.php?nro_hab=<?php echo $habitacion['nro_hab'];?>">Eliminar</a>
        <a href="actualizar.php?nro_hab=<?php echo $habitacion['nro_hab'];?>">Actualizar</a>
    </td>
            <?php } ?>
        </td>
        
        
    </tr>
</table>

<?php 
mysqli_close($bd);
?>

</body>
</html>