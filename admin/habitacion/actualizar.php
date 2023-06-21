<?php 
require '../../includes/funciones.php';

//Verificar con filter validate que el dato enviado sea válido para poder actualizar por el id entero que se recibe en el GET
$nro_hab_actualizar = $_GET['nro_hab'];
$nro_hab_actualizar = filter_var($nro_hab_actualizar, FILTER_VALIDATE_INT);

if(!$nro_hab_actualizar){
    header('../../index.php');
}

$bd = conectar_db();

$consulta_habitacion = "SELECT * FROM habitacion WHERE nro_hab = $nro_hab_actualizar";
$resultado = mysqli_query($bd, $consulta_habitacion);
$habitacion = mysqli_fetch_assoc($resultado);

$nro_hab = $habitacion['nro_hab'];
$estado = $habitacion['estado'];
$descripcion = $habitacion['descripcion'];
$id_tipo_h = $habitacion['id_tipo_h'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nro_hab = $_POST['nro_hab'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $id_tipo_h = $_POST['id_tipo_h'];

    if(!$nro_hab){
        $errores[] = 'El número de identificación de la habitacion es obligatorio';
    }
    if(!$estado){
        $errores[] = 'El estado de la habitacion es obligatorio';
    }
    if(!$descripcion){
        $errores[] = 'La descripcion de la habitacion es obligatoria';
    }
    if(!$id_tipo_h){
        $errores[] = 'El número de identificación del tipo de habitacion es obligatorio';
    }
    
    if(empty($errores)){
    //Actualizar los datos a la BD
    
        $sql = "UPDATE habitacion SET 
        nro_hab = $nro_hab,
        estado = '$estado',
        descripcion = '$descripcion',
        id_tipo_h = '$id_tipo_h'
        WHERE nro_hab = $nro_hab_actualizar";

        echo $sql;

        $resultado = mysqli_query($bd, $sql);

        if($resultado){
            //'El registro se ha actualizado correctamente';
            //Nos devolvemos a la página inicial
            header('location: ../../index.php');

        }
        }
        else{
            foreach($errores as $error){
                echo '<br>' . $error;
            }
        }
    }        
?>
<head>
    <link rel="stylesheet" href="../../estilos/estilos.css">
    
</head>
<div>
    <h3>Actualizar habitacion</h3>

    <a href="../../index.php"><input type="button" id="regresar" name="regresar" value="Regresar"></a>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Datos</legend>
            <label for="nro_hab">No. Habitacion:</label><br>
            <input type="number" id="nro_hab" name="nro_hab" value="<?php echo $nro_hab?>"><br>

            <label for="estado">Estado de la habitacion:</label><br>
            <input type="text" id="estado" name="estado" value="<?php echo $estado?>"><br>

            <label for="descripcion">Descripcion de la habitacion:</label><br>
            <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion?>"><br>

            <label for="id_tipo_h">No. Tipo de habitacion:</label><br>
            <input type="text" id="id_tipo_h" name="id_tipo_h" value="<?php echo $id_tipo_h?>"><br>

            <input type="submit" id="enviar" name="enviar" value="Actualizar datos">
        </fieldset>
        
    </form>

</div>

