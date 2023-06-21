<?php 
require '../../includes/funciones.php';

//Verificar con filter validate que el dato enviado sea válido para poder eliminar por el codigo del cliente que se recibe en el GET
$nro_hab_eliminar = $_GET['nro_hab'];
$nro_hab_eliminar = filter_var($nro_hab_eliminar, FILTER_VALIDATE_INT);

if(!$nro_hab_eliminar){
    header('../../index.php');
}

$bd = conectar_db();

    $sql = "DELETE FROM habitacion WHERE nro_hab = $nro_hab_eliminar";
    echo $sql;
    $resultado = mysqli_query($bd, $sql);

    if($resultado){
        //'El registro se ha eliminado correctamente';
        //Nos devolvemos a la página inicial
        header('location: ../../index.php');
    }
