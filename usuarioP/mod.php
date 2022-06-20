<?php 
    session_start();
    if(isset($_SESSION["email"])){
?> 
  <?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"proyectofinal");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ecommerce WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ecommerce ropa mujer hombre niños">
    <meta name="keywords" content="pantalon, remera, ropa, vestido, mujer, hombre, niños">
    <meta name="author" content="Lucía Soledad Tassi">
    <title>GAJIMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
 <!--comienza cuerpo-->
<body>
 <!--menu principal y logo-->
  <header class="container">
    <section class="row">
      <h4 class="text-center col-sm-12 col-md-12 col-lg-12">Bienvenido - <?php echo$_SESSION['email'];?></h1>
    </section>
    <nav class="row principal">
      <img class="logo col-sm-12 col-md-9 col-lg-9" src="../imagenes/logo.png" alt="logo de la marca">
      <div class="menu col-sm-12 col-md-3 col-lg-3">
          <ul>
            <li>
              <a class="cerrar" href="salir.php">Cerrar sesión</a>
            </li>
            <li>
              <a href="modificaciones.php">Regresar</a>
            </li>
          </ul>
         
      </div>    
    </nav>
  </header>   
  <main class="container">
        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $color=$datos['color'];
        $sexo=$datos['sexo'];
        $articulo=$datos['articulo'];
        $filtro=$datos['filtro'];
        $talle=$datos['talle'];
        $precio=$datos['precio'];
        $imagen=$datos['imagen'];
        ?>
        <div class="row">

          <h2>Modificar</h2>
          <p>Ingrese los nuevos datos de la prenda.</p>
          <form class="card-body col-lg-5 col-sm-12 estilomodal"action="" method="POST" enctype="multipart/form-data">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <input type="file" name="imagen" placeholder="imagen">                                   
                <label>Tipo de prenda</label>
                <input type="text" name="articulo" placeholder="Articulo" value="<?php echo $articulo;?>" required>
                <label>Colores</label>
                <input type="text" name="color" placeholder="Colores" value="<?php echo $color;?>" required>
                <label>Talle</label>
                <input type="text" name="talle" placeholder="Talle" value="<?php echo $talle;?>" required>
                <label>Precio</label>
                <input type="text" name="precio" placeholder="Precio" value="<?php echo $precio;?>" required> 
                <label>Sexo</label>
                <input type="text" name="sexo" placeholder="Sexo" value="<?php echo $sexo;?>" required> 
                <label>Filtro</label>
                <input type="text" name="filtro" placeholder="filtro" value="<?php echo $filtro;?>" required> 
                <input class="btn"type="submit" name="guardar_cambios" value="Guardar Cambios">
                <button class="btn"type="submit" name="Cancelar" formaction="modificaciones.php">Cancelar</button>
              </div>
            </div>
          </form>
          <!-- card con prenda que se modificaciones -->
          <div class="card col-lg-5 col-sm-12">
            <form action="mod.php" method="POST" enctype="multipart/form-data">
              <img src="data:image/jpg;base64, <?php echo base64_encode($imagen)?>"  class="card-img-top" alt="ropa mujer">
              <div class="card-body">
                <h5 class="card-title"><?php echo $articulo; ?></h5>
                <div>
                  <h6>Colores</h6>
                    <select name="OS">
                      <option ><?php echo $color;?></option> 
                    </select>
                </div>   
                <div>
                  <h6>Talle</h6>
                  <select name="OS">
                  <option ><?php echo $talle;?></option> 
                  </select>
                </div>
                <div class="precio">
                  <p><?php echo $precio; ?></p>
                </div>   
              </div>
            </form>
          </div> 
        </div>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){
          // 2') Almacenamos los datos actualizados del envío POST
          // a) generar variables para cada dato a almacenar en la bbdd
          // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
          // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
          $color=$_POST['color'];
          $sexo=$_POST['sexo'];
          $articulo=$_POST['articulo'];
          $filtro=$_POST['filtro'];
          $talle=$_POST['talle'];
          $precio=$_POST['precio'];
          $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
          // 3') Preparar la orden SQL
          // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
          // a) generar la consulta a realizar
           $consulta = "UPDATE ecommerce SET filtro='$filtro', articulo='$articulo', color='$color', sexo='$sexo', talle='$talle', precio='$precio', imagen='$imagen' WHERE id=$id";
          // 4') Ejecutar la orden y actualizamos los datos
          // a) ejecutar la consulta
          mysqli_query($conexion,$consulta);
          // a) rederigir a index
          header('location:modificaciones.php');
        } ?>




  <!--PIE DE PAGINA-->
  <footer class="row">
    <p class=" text-center col-sm-12 col-md-12 col-lg-12">Lucia Soledad Tassi</p>  
  </footer>
  <script src="usuariop.js"></script>
    </body>
</html>
<?php
}else{
    header("location:../index.php");
}
?>