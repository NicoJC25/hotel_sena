<?php

require '../../includes/funciones.php';

$bd = conectar_db();


$consulta = "SELECT * FROM habitacion";


$resultado_consulta = mysqli_query($bd, $consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Habitaciones</title>
</head>
<body>
<h3>Gestion de habitaciones - Consultar</h3>  

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
            <a href="">Eliminar</a>
            <a href="/admin/habitacion/actualizar.php?id=<?php echo $habitacion['nro_hab'];?>">Actualizar</a>
            <?php } ?>
        </td>
        
        
    </tr>
    <a href="../../index.php">Regresar...</a>
</table>

<?php 
mysqli_close($bd);
?>

</body>
</html>