<?php 
    session_start();
    if(isset($_SESSION["email"])){
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
                <a href="salir.php">Cerrar sesión</a>
            </div>    
        </nav>
    </header>
    <!--FILTROS-->
    <div class="container">
        <button type="button" class="btn botonFiltro btn-outline-danger">Filtros</button>
        <div class="losFiltros row">
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="arriba()" type="checkbox">Partes de arriba</label>
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="abajo()" type="checkbox">Partes de abajo</label>
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="mallas()" type="checkbox">Mallas</label>
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="conjunto()" type="checkbox">Conjuntos</label>
        </div>
    </div>    
    <main class="container">
        <!--ARTICULOS A LA VENTA IMAGENES-->
        <article class="row articulos" id="articulos">
            <?php
                // 1) Conexion
                $conexion = mysqli_connect("127.0.0.1", "root", "");
                mysqli_select_db($conexion, "proyectofinal");

                // 2) Preparar la orden SQL
                // Sintaxis SQL SELECT
                // SELECT * FROM nombre_tabla
                // => Selecciona todos los campos de la siguiente tabla
                // SELECT campos_tabla FROM nombre_tabla
                // => Selecciona los siguientes campos de la siguiente tabla
                $consulta='SELECT * FROM ecommerce';

                // 3) Ejecutar la orden y obtenemos los registros
                $datos= mysqli_query($conexion, $consulta);
                
                ?>

                <!--card para agregar productos-->
                <div id="modificar" class="col-sm-12 col-md-4 col-lg-3">
                    <form class="card-body" method="POST" action="agregar.php" enctype="multipart/form-data">
                        <label>Imagen</label>
                        <input type="file" name="imagen" placeholder="imagen" required >
                        <label>Tipo de prenda</label>
                        <input type="text" name="articulo" placeholder="Articulo" required>
                        <label>Colores</label>
                        <input type="text" name="color" placeholder="Colores" required>
                        <label>Talle</label>
                        <input type="text" name="talle" placeholder="Talle" required>
                        <label>Precio</label>
                        <input type="text" name="precio" placeholder="Precio" required> 
                        <label>Sexo</label>
                        <input type="text" name="sexo" placeholder="Sexo" required> 
                        <label>Filtro</label>
                        <input type="text" name="filtro" placeholder="filtro" required> 
                        <input type="submit" class="btn-warning btn" value="Ingresar"></button>                  
                    </form>
                    
                </div>
                <!-- MODAL PARA MODIFICAR PRODUCTOS-->

                <div class="modal modalmodif" id="modificacionesmodal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6>Ingrese los nuevos datos de la prenda</h6>
                                <button onclick="cierraModificaciones()" type="button" class= data-bs-dismiss="modal" aria-label="Close"><a href="modificaciones.php">X</a></button>
                            </div>
                            <div class="modal-body">
                                <form class="card-body estilomodal"action="mod.php" method="POST" enctype="multipart/form-data">
                                    <label>Imagen</label>
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
                                    <input class="boton btn-warning"type="submit" name="guardar_cambios" value="Guardar Cambios">
                                </form>
                            </div>
                    </div>
                </div>
            </div>
            <?php
            //  recorro todos los registros y genero una CARD PARA CADA UNA
            while ($reg = mysqli_fetch_array($datos)) {?>
                <div class="<?php echo $reg['filtro']?> card col-sm-12 col-md-4 col-lg-3">
                    <img src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen'])?>"  class="card-img-top" alt="ropa mujer">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $reg['articulo']; ?></h5>
                        <div>
                            <h6>Colores</h6>
                            <select name="OS">
                                <option ><?php echo $reg['color'];?></option> 
                                
                            </select>
                        </div>   
                        <div>
                            <h6>Talle</h6>
                            <select name="OS">
                                <option ><?php echo $reg['talle'];?></option> 
                            </select>
                        </div>
                        <div class="precio">
                            <p><?php echo $reg['precio']; ?></p>
                        </div>   
                        <button type="button" onclick="abreModificaciones()" class="btn modificar btn-warning"><a href="mod.php?id=<?php echo $datos1['id'];?>">Modificar</a></button>                  
                        <button type="button" id="eliminar" class="btn btn-warning"><a href="borrar.php?id=<?php echo $reg['id'];?>">Eliminar</a></button>                
                    </div>
                </div>
            <?php } ?>
        </article>        
    </main>
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