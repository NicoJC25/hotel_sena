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

        $id_tipo_h = $_POST['id_tipo_h'];
        $nombre = $_POST['nombre'];
        $capacidad = $_POST['capacidad'];
        $valor_base = $_POST['valor_base'];
        $id_mob = $_POST['id_mob'];

        if(!$id_tipo_h){
            $errores[] = 'El número de tipo de habitacion es obligatorio';
        }
        if(!$nombre){
            $errores[] = 'El nombre es obligatorio';
        }
        if(!$capacidad){
            $errores[] = 'La capacidad es obligatoria';
        }
        if(!$valor_base){
            $errores[] = 'El valor_base es obligatorio';
        }
        if(!$id_mob){
            $errores[] = 'El numero de mobiliario es obligatorio';
        }
        
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "INSERT INTO tipo_h (id_tipo_h, nombre, capacidad, valor_base, id_mob) 
            VALUES ('$id_tipo_h', '$nombre', '$capacidad', '$valor_base', '$id_mob')" ;

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
    <p>Nuevo tipo de habitacion</p>

    <a href="../../index.php">Regresar</a>

    <form class="formulario" method="POST" action="crear2.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id_tipo_h">No. Tipo de habitacion:</label><br>
            <input type="text" id="id_tipo_h" name="id_tipo_h"><br>

            <label for="nombre">Nombre del tipo de habitacion:</label><br>
            <input type="text" id="nombre" name="nombre"><br>

            <label for="capacidad">Capacidad de la habitacion:</label><br>
            <input type="number" id="capacidad" name="capacidad" ><br>

            <label for="valor_base">Valor base de la habitacion:</label><br>
            <input type="number" id="valor_base" name="valor_base" ><br>

            <label for="id_mob">Numero de mobiliario de la habitacion:</label><br>
            <input type="text" id="id_mob" name="id_mob" ><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
        
    </form>

</div>

