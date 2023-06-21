<?php 
require '../../includes/funciones.php';

$bd = conectar_db();

//El arreglo $errores nos guarda mensajes de error en caso de no escribir nada en el formulario
$errores =  [];

//echo '<pre>';
//if(($_SERVER['REQUEST_METHOD'])){
//echo '<pre>';
//var_dump(($_POST));
//}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nro_hab = $_POST['nro_hab'];
        $estado = $_POST['estado'];
        $descripcion = $_POST['descripcion'];
        $id_tipo_h = $_POST['id_tipo_h'];

        if(!$nro_hab){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(!$estado){
            $errores[] = 'El estado es obligatorio';
        }
        if(!$descripcion){
            $errores[] = 'La descripcion es obligatoria';
        }
        if(!$id_tipo_h){
            $errores[] = 'El id de tipo de habitacion es obligatorio';
        }
        
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "INSERT INTO habitacion(nro_hab, estado, descripcion, id_tipo_h) 
            VALUES ('$nro_hab', '$estado', '$descripcion', '$id_tipo_h')";

            echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if($resultado){
                //'El registro se ha insertado correctamente';
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
<div>
    <p>Nueva habitacion</p>

    <a href="../../index.php">Regresar</a>

    <form class="formulario" method="POST" action="crear.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="nro_hab">No. habitacion:</label><br>
            <input type="number" id="nro_hab" name="nro_hab"><br>

            <label for="estado">Estado de la habitacion:</label><br>
            <input type="text" id="estado" name="estado"><br>

            <label for="descripcion">Descripcion de la habitacion:</label><br>
            <input type="text" id="descripcion" name="descripcion" ><br>

            <label for="id_tipo_h">No. Tipo de habitacion:</label><br>
            <input type="text" id="id_tipo_h" name="id_tipo_h" ><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
        
    </form>

</div>

