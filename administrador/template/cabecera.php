<?php
$tema = 'claro'; // Tema por defecto
if (isset($_COOKIE['tema'])) {
  $tema = $_COOKIE['tema'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link id="mi-estilo" rel="stylesheet" href="./css/<?php echo $tema; ?>.css">
    <!-- <link id="tema" rel="stylesheet" href="./css/oscuro.css"> -->
    <link rel="stylesheet" href="css/cabecera.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo1.png" />
    <script src="./js/tema.js"></script>
    
    
</head>
<body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/proyecto" ?>

    <nav class="navbar navbar-expand navbar-light bg-primary align-items-center">
    
        
        <div class="nav navbar-nav ">
            <div class="navegacion">
               <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/inicio.php"><b>Inicio</b></a>
            </div>
            <div class="navegacion">
               <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/balance.php"><b>Balance Total</b></a>
            </div>
            <div class="navegacion">
               <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/gestion.php"><b>Gestionar</b></a>
            </div>
            <div class="navegacion">
               <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/prestamos.php"><b>Prestamos</b></a>
            </div>
            <div class="navegacion">
               <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/conversion.php"><b>Reconversión Monetaria</b></a>
            </div>
            <div class="navegacion">
               <a class="nav-item nav-link active" href="<?php echo $url;?>/administrador/salida.php"><b>Cerrar</b></a>
            </div>
            <div class="botontema">
               <button id="mi-boton" onclick="cambiarEstilo()" class="btn nav-item nav-link active border-0"><p>Cambiar Tema</p></button>
            </div>
        </div>        
        <div class="imagen">
            <img src="img/logo.ico" alt="">
        </div>
        
    </nav>

    
        <div class="container">

            <div class="row">