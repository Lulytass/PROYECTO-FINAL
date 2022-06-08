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
    <link rel="stylesheet" href="niños.css">
</head>
<body>
    <!--menu principal y logo-->
    <header class="container">
        <section class="row">
            <p class="text-center col-sm-12 col-md-12 col-lg-12">En compras mayores a $5000 dentro de Capital Federal el envio es GRATIS</p>
        </section>
        <nav class="row principal">
            <img class="logo col-sm-12 col-md-9 col-lg-9" src="../imagenes/logo.png" alt="logo de la marca">
            <div class="menu col-sm-12 col-md-3 col-lg-3">
                <ul>
                    <li>
                        <a href="mailto:luly8608@gmail.com"><img src="../imagenes/chat.png" alt="logo mail"></a>
                    </li>
                    <li>
                        <img onclick="abreModal()" src="../imagenes/usuario.png" alt="logo usuario">
                    </li>
                    <li>
                        <img onclick="abreModalCarrito()" src="../imagenes/canasto.png" alt="logo carrito">
                    </li>
                </ul>
            </div>    
        </nav>
    </header> 
    <!--MODAL USUARIO-->
    <div class="modal cuadro" id="contacto" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content formulario">
                <div class="modal-header partes">
                    <h5 class="modal-title">ACCEDÉ A TU CUENTA</h5>
                </div>
                <div class="modal-body partes">
                    <form class="partes" action="login.php" method="post">
                        <input type="email" name="email" placeholder="Mail"> <br>
                        <input  type="password" name="pass" placeholder="Password">
                        <input class=" user btn btnusuario" type="submit" value="ENVIAR">

                    </form>
                    <p>Aun no tenes Usuario? <a href="#">REGISTRATE AHORA</a></p>
                </div>
                <div class="modal-footer partes">
                    <input onclick="cierraModal()" type="button" class="btn btnusuario cerrarModal" value="CERRAR">
                </div>
            </div>
        </div>
    </div>
    <!--MODAL CARRITO-->
    <div class="modal" id="carrito" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content modalCarrito">
                <div class="modal-header">
                  <h5 class="modal-title">CARRITO DE COMPRAS</h5>
                  <button onclick="cierraModalCarrito()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>PROXIMAMENTE VAS A PODER HACER TUS COMPRAS DE MANERA ONLINE</p>
                </div>
                <div class="modal-footer">
                  <button onclick="cierraModalCarrito()" type="button" class="btn btncarrito" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--FILTROS-->
    <div class="container">
        <button type="button" class="btn botonFiltro btn-outline-danger">Filtros</button>
        <div class="losFiltros row">
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="arriba()" type="checkbox">Partes de arriba</label>
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="abajo()" type="checkbox">Partes de abajo</label>
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="conjunto()" type="checkbox">Conjuntos</label>
            <label class="col-sm-3 col-md-3 col-lg-3 text-center" for=""><input onclick="vestido()" type="checkbox">Vestidos</label>
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
            $consulta='SELECT * FROM ecommerce where sexo = "niño"';

            // 3) Ejecutar la orden y obtenemos los registros
            $datos= mysqli_query($conexion, $consulta);

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
                        <button type="button" class="btn btn-warning">Comprar</button>                
                    </div>
                </div>
            <?php } ?>
        </article>    
        <!--MENU BAJO-->
        <section class="row menubajo">
            <div class=" columna1 col-sm-12 col-md-6 col-lg-6">
                <a  href="#">Preguntas Frecuentes</a>
                <a href="#">Pago Seguro</a>
                <a href="#">Terminos & Condiciones</a>
                <DIV class="tarjetas">
                    <p>Formas de Pago</p>
                    <div><img src="../imagenes/card.png" alt=""><img src="../imagenes/card.png" alt=""><img src="../imagenes/card.png" alt=""><img src="../imagenes/card.png" alt=""><img src="../imagenes/card.png" alt=""><img src="../imagenes/card.png" alt=""></div>
                </DIV>    
            </div>
            <DIv class="mapa col-sm-12 col-md-6 col-lg-6">
                <P>Ubicacion</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13135.141330623734!2d-58.4499964!3d-34.6095894!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8b086e48cf2ee5e2!2sEscuela%20Superior%20de%20Comercio%20N%C2%B0%203%20DE%207%20Hip%C3%B3lito%20Vieytes!5e0!3m2!1ses-419!2sar!4v1635261931078!5m2!1ses-419!2sar" width="500" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </DIv>
        </section>
        <hr>
        <!--REDES SOCIALES-->
        <nav class="row">
            <h3 class="col-sm-12 col-md-12 col-lg-12">Nuestras Redes</h3>
            <div class="redes">
                <a class=" text-center col-sm-4 col-md-4 col-lg-4" href="#"><img src="../imagenes/twitter.png" alt=""></a>
                <a class=" text-center col-sm-4 col-md-4 col-lg-4" href="#"><img src="../imagenes/instagram.png" alt=""></a>
                <a class=" text-center col-sm-4 col-md-4 col-lg-4" href="#"><img src="../imagenes/facebook.png" alt=""></a>
            </div>  
        </nav>
        <hr>
    </main>
    <!--PIE DE PAGINA-->
    <footer class="row">
        <p class=" text-center col-sm-12 col-md-12 col-lg-12">Lucia Soledad Tassi</p>  
    </footer>
    <script src="chicos.js"></script>
</body>
</html>