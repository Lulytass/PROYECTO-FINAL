<?php
  // 1) Conexion
  // a) realizar la conexion con la bbdd
  // b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"proyectofinal");
  // 2) Almacenamos los datos del envío POST
  // a) generar variables para cada dato a almacenar en la bbdd
  $articulo = $_POST ['articulo'];
  $color = $_POST['color'];
  $talle = $_POST['talle'];
  $precio = $_POST['precio'];
  $sexo= $_POST['sexo'];
  $filtro= $_POST['filtro'];

 // Si se desea almacenar una imagen en la base de datos usar lo siguiente: addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
  $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

  // 3) Preparar la orden SQL
  // INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
  // => Ingresa dentro de la siguiente tabla los siguientes valores
  // a) generar la consulta a realizar
$consulta = "INSERT INTO ecommerce (id,filtro,precio,talle,articulo,imagen,color,sexo)
        VALUES ('','$filtro','$precio','$talle','$articulo','$imagen','$color','$sexo')";

  // a) ejecutar la consulta
  mysqli_query($conexion,$consulta);
  // a) rederigir a index
  header('location: modificaciones.php');
?>