<?php
// 1) Conexion
$conexion=mysqli_connect("127.0.0.1","root","","proyectofinal");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ecommerce WHERE id = $id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos1=mysqli_fetch_array($repuesta);
?>

<?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $precio=$datos1["precio"];
        $filtro=$datos1["filtro"];
        $talle=$datos1["talle"];
        $articulo=$datos1["articulo"];
        $imagen=$datos1['imagen'];
        $color=$datos1['color'];
        $sexo=$datos1['sexo'];
?>
        // <?php
        //Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
       if(array_key_exists('guardar_cambios',$_POST)){
            //2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
           $precio=$_POST["precio"];
           $filtro=$_POST["filtro"];
           $talle=$_POST["talle"];
           $articulo=$_POST["articulo"];
           $color=$_POST['color'];
           $sexo=$_POST['sexo'];            
           $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
         //    $consulta = "UPDATE ecommerce SET sexo='$sexo', articulo='$articulo', precio='$precio', filtro='$filtro', talle='$talle', color='$color', imagen='$imagen' WHERE id=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
          mysqli_query($conexion,$consulta);
            // a) rederigir a index
          header('location: modificaciones.php');
         } ?>
