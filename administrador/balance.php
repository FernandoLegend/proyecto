<?php include("./template/cabecera.php"); 
include("./template/sesion.php"); 
include("config/bd.php");
$eliminacion=(isset($_POST['eliminacion']))?$_POST['eliminacion']:"";
switch($eliminacion){
    case'Vaciar Ingresos por Intereses':
        $sentenciaSQL= $conexion->prepare("TRUNCATE TABLE traspaso;");
        $sentenciaSQL->execute();
}
$con=conectar();
$sql="SELECT Saldo FROM afiliados";
$query=mysqli_query($con, $sql);
$suma=0;
$sql1="SELECT monto FROM prestamos";
$query1=mysqli_query($con, $sql1);
$suma1=0;
$sql2="SELECT prueba FROM traspaso";
$query2=mysqli_query($con, $sql2);
$suma2=0;
?>
<link rel="stylesheet" href="css/balance.css">
<title>Balance Total</title>
<div class="espa">
    <h3>Balance Total de Ahorros</h3>
</div>
<br>
<?php             
    while($row=mysqli_fetch_array($query)){ 
        $suma = $suma + $row['Saldo'];
        
    };        
?>
<b><h3><?php echo number_format($suma, 2, "," , ".");?> Bs.</h3></b>
<br><br>
<hr>
<div class="espa">
    <h3>Total de los Prestamos Otorgados</h3>
</div>
<br>
<?php             
    while($row1=mysqli_fetch_array($query1)){ 
        $suma1 = $suma1 + $row1['monto'];
        
    };        
?>
<b><h3><?php echo number_format($suma1, 2, "," , ".")?> Bs.</h3></b>
<br><br>
<hr>
<div class="espa">
    <h3>Total de Ingresos por Pago de Intereses</h3>
</div>
<br>
<?php             
    while($row2=mysqli_fetch_array($query2)){ 
        $suma2 = $suma2 + $row2['prueba'];
        
    };        
?>
<b><h3><?php echo number_format($suma2, 2, "," , "."); ?> Bs.</h3></b>


<form method="POST">
    <input type="submit" name="eliminacion" class="btn btn-info" value="Vaciar Ingresos por Intereses" id="eliminacion" class="btn botona btn-outline" onclick="return eliminar()"/>
</form>
<?php include("./template/pie.php") ?>
<script src="../confirma2.js"></script>