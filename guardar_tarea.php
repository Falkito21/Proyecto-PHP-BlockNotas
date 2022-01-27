<?php

// CONECTO A LA BASE DE DATOS
include("db.php");

// SI ME ENVIAN POR POST LA ACCION DE guardar_tarea
if (isset($_POST['guardar_tarea'])) {
    
    // LE PASO A $titulo EL VALOR QUE ENTRA POR POST DEL FORMULARIO CON EL NOMBRE DE titulo
    $titulo = $_POST['titulo'];

    // LE PASO A $descripcion EL VALOR QUE ENTRA POR POST DEL FORMULARIO CON EL NOMBRE DE descripcion
    $descripcion = $_POST['descripcion'];
    
    // GUARDO EN $consulta LA CONSULTA QUE LE HAGO A LA BASE DE DATOS 
    $consulta = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')"; //le digo que guarde los valores de $titulo y $descripcion en los valores de la base de datos que tenga el nombre titulo y descripcion

    // GUARDO EN $resultado EL ENVIO DE DATOS A LA BASE DE DATOS 
    $resultado = mysqli_query($conect, $consulta);

    // SI FALLA ALGO A LA HORA DE GUARDAR LOS DATOS EN $resultado...
    if (!$resultado) {
        // MENSAJE DE ERROR
        die("Falla de consulta");
    }

    // INICIO UNA SESSION CON LA VARIABLE mensaje DONDE GUARDO UNA ALERTA
    $_SESSION['mensaje'] = 'Tarea guardada correctamente';

    //INICIO UNA SESSION CON LA VARIABLE tipo_mensaje DONDE INDICO EL COLOR QUE QUIERO QUE TENGA EL MESAJE
    $_SESSION['tipo_mensaje'] = 'success';

    // INDICO QUE CUANDO TERMINE TODO VUELVA AL index.php
    header("Location: index.php");
}

?>