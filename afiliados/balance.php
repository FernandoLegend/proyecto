<?php include("./template/cabecera.php"); 
include("./template/sesion.php"); 
include("config/bd.php");
$con=conectar();
$sql="SELECT Saldo FROM afiliados";
$query=mysqli_query($con, $sql);
$suma=0;?>
<link rel="stylesheet" href="css/balance.css">
<title>Balance Total</title>
<div class="espa">
    <h2>Ahorro Actual en caja:</h2>
</div>
<br><br><br><br><br><br><br>
<?php             
$records = $conexion->prepare('SELECT * FROM afiliados WHERE cedula=:contrasenia') ;
$records->bindParam(':contrasenia',$_SESSION['Identity']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
?>
<b><h1><?php echo number_format($results['Saldo'], 2, "," , ".") ;?> Bs.</h1></b>

<hr>

<?php include("./template/pie.php") ?>