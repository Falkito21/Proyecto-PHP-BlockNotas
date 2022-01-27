<?php  

// INICIO SESSION
session_start();

// CONECCION A BASE DE DATOS
$conect = mysqli_connect(
    'localhost',
    'root',
    '',
    'crudnotas_php'
);
?>