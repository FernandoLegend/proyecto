<?php $url="http://".$_SERVER['HTTP_HOST']."/proyecto" ?>
<?php include("./template/sesion.php") ?>
<link rel="stylesheet" href="css/animacion.css">
<link rel="shortcut icon" href="img/logo1.png"/>
<div class="loading first">
  <div class="loading second">
    <div class="loading third"></div>  
  </div>  
</div>
<title>Saliendo del Sistema...</title>
<script language="JavaScript">
  function redireccionar() {
    setTimeout("location.href='seccion/cerrar.php'", 1663);
  }
  </script>
  <body onLoad="redireccionar()">