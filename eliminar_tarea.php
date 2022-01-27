<?php 

// CONECTO A LA BASE DE DATOS
include("db.php");

// SI ME ENVIARON POR GET EL VALOR DE id
if(isset($_GET['id'])){

    // QUE GUARDE EN $id EL VALOR QUE ME PASEN POR GET
    $id = $_GET['id'];

    // GUARDO EN $consulta LA CONSULTA QUE LE HAGO A LA BASE DE DATOS 
    $consulta = "DELETE FROM tareas WHERE id = $id";

    // GUARDO EN $resultado EL ENVIO DE DATOS A LA BASE DE DATOS 
    $resultado = mysqli_query($conect, $consulta);

    // SI FALLA ALGO A LA HORA DE GUARDAR LOS DATOS EN $resultado...
    if (!$resultado) {

        // MENSAJE DE ERROR
        die("Consulta fallida");
    }

    // INICIO UNA SESSION CON LA VARIABLE mensaje DONDE GUARDO UNA ALERTA
    $_SESSION['mensaje'] = 'Tarea eliminada correctamente';

    //INICIO UNA SESSION CON LA VARIABLE tipo_mensaje DONDE INDICO EL COLOR QUE QUIERO QUE TENGA EL MESAJE
    $_SESSION['tipo_mensaje'] = 'danger';

    // INDICO QUE CUANDO TERMINE TODO VUELVA AL index.php
    header("Location: index.php");
}
?>