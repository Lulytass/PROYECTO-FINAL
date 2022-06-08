<?php

  $EMAIL = $_POST["email"];

  $PASS = $_POST["pass"];

  session_start();
  $_SESSION["email"]=$EMAIL;


  // 1) Conexion
  $conexion = mysqli_connect("127.0.0.1", "root", "", "proyectofinal");
  
  // 2) Preparar la orden SQL
  // Sintaxis SQL SELECT
  // SELECT * FROM nombre_tabla
  // => Selecciona todos los campos de la siguiente tabla
  // SELECT campos_tabla FROM nombre_tabla
  // => Selecciona los siguientes campos de la siguiente tabla
  $consulta = "SELECT * FROM cliente WHERE email = '$EMAIL' AND pass = '$PASS'";  
  // 3) Ejecutar la orden y obtenemos los registros
  $result= mysqli_query($conexion, $consulta);

  $filas = mysqli_num_rows($result);
  if($filas){
     header("location:usuarioP/modificaciones.php");
  }
  else{
    ?>
  <?php
  header("location:index.php");
    
  ?>
    
    
   
    <?php
  }
MYSQLI_FREE_RESULT($result);
mysqli_close($conexion);
?>
 