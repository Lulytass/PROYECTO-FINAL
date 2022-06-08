<?PHP
$arriba= $_POST["arriba"];
$abajo= $_POST["arriba"];
$mallas= $_POST["arriba"];
$conjunto= $_POST["arriba"];

if($arriba){
    $consulta = "SELECT * FROM ecommerce WHERE filtro = 'arriba'";
}

?>