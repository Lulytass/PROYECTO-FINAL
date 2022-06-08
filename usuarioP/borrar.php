<?php
    // 1) Conexion
    $conexion = mysqli_connect("127.0.0.1", "root", "", "proyectofinal");
    // 2) Traemos con el metodo GET el ID del articulo en el que apretamos borrar
    // lo guardamos en una variable
    $id = $_GET["id"];

        
    // 3) Preparar la orden SQL
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta="DELETE FROM ecommerce WHERE id = '$id'";

    // 4) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query($conexion, $consulta);

    header("location:modificaciones.php");

?>
