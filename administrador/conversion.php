<?php include("./template/cabecera.php"); 
include("./template/sesion.php"); 
include("config/bd.php");

$accion=(isset($_POST['carga']))?$_POST['carga']:"";
$valor=(isset($_POST['floatingInput']))?$_POST['floatingInput']:"";

switch($accion){

    case "Devaluación":

        $sentenciaSQL= $conexion->prepare("UPDATE traspaso SET prueba = prueba/:valor");
        $sentenciaSQL->bindParam(':valor',$valor);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE afiliados SET Saldo = Saldo/:valor, sueldo = sueldo/:valor");
        $sentenciaSQL->bindParam(':valor',$valor);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE prestamos SET monto = monto/:valor, total = total/:valor, montoxcuota = montoxcuota/:valor ");
        $sentenciaSQL->bindParam(':valor',$valor);
        $sentenciaSQL->execute();

        $sentenciaSQL= $conexion->prepare("UPDATE cuotas SET pago = pago/:valor");
        $sentenciaSQL->bindParam(':valor',$valor);
        $sentenciaSQL->execute();
        

    // case "Revalorización":

    //     $sentenciaSQL= $conexion->prepare("UPDATE traspaso SET prueba = prueba*:valor");
    //     $sentenciaSQL->bindParam(':valor',$valor);
    //     $sentenciaSQL->execute();

    //     $sentenciaSQL= $conexion->prepare("UPDATE afiliados SET Saldo = Saldo*:valor, sueldo = sueldo*:valor");
    //     $sentenciaSQL->bindParam(':valor',$valor);
    //     $sentenciaSQL->execute();

    //     $sentenciaSQL= $conexion->prepare("UPDATE prestamos SET monto = monto*:valor, total = total*:valor, montoxcuota = montoxcuota*:valor ");
    //     $sentenciaSQL->bindParam(':valor',$valor);
    //     $sentenciaSQL->execute();

    //     $sentenciaSQL= $conexion->prepare("UPDATE cuotas SET pago = pago*:valor");
    //     $sentenciaSQL->bindParam(':valor',$valor);
    //     $sentenciaSQL->execute();


}

?>
<link rel="stylesheet" href="css/conversion.css">
<title>Conversión</title>
<hr><br>
<div class="compartirs">
<form method="POST">
    <div class="form-floating col-3 form">
        <input type="number" min="1" class="form-control" name="floatingInput" id="floatingInput" class="compartirs col-md-6 form-control" placeholder="Valor de la conversión">
        <label for="floatingInput">Valor de la Conversión</label>
    </div>
<br>
<div class="boton">
    <input type="submit" name="carga" id="carga" value="Devaluación" class="btn btn-success" onclick="return eliminar()">
    <!-- <input type="submit" name="carga" id="carga" value="Revalorización" class="btn btn-success"> -->
</div>
</div>
<script src="../confirma3.js"></script>