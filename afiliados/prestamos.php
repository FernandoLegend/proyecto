<?php include("./template/cabecera.php") ?>
<?php include("./template/sesion.php") ?>
<?php

include("config/bd.php");
settype($txtID, "integer");
settype($busqueda, "integer");
$busqueda=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
$id=(isset($_POST['id']))?$_POST['id']:"";
$cedula=(isset($_POST['cedula']))?$_POST['cedula']:"";
$tipo=(isset($_POST['tipo']))?$_POST['tipo']:"";
$monto=(isset($_POST['monto']))?$_POST['monto']:"";
$cuotas=(isset($_POST['cuotas']))?$_POST['cuotas']:"";
$interes=(isset($_POST['interes']))?$_POST['interes']:"";
$txtRetiro=(isset($_POST['txtRetiro']))?$_POST['txtRetiro']:"";
$txtDescuento=(isset($_POST['txtDescuento']))?$_POST['txtDescuento']:"";
$txtSaldo=(isset($_POST['txtSaldo']))?$_POST['txtSaldo']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $traspaso=(isset($_POST['txtID']))?$_POST['txtID']:"";
    
    switch($accion){

        case "Borrar":
            $sentenciaSQL= $conexion->prepare("DELETE FROM prestamos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$id);
            $sentenciaSQL->execute();
            //echo "Boton: Borrar";
            break;

        case "Detalles":

            $conta=1;
            $sentenciaSQL= $conexion->prepare("SELECT * FROM traspaso WHERE conta=:conta");
            $sentenciaSQL->bindParam(':conta',$conta);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("SELECT * FROM prestamos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $sentenciaSQL->bindParam(':cedula',$txtCI);
            
            $sentenciaSQL->execute();
            $listarows=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $sentenciaSQL= $conexion->prepare("UPDATE traspaso SET primero=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            header('Location: '."morepres.php?tabla=$id&tabla1=$cedula&tabla2=$tipo&tabla3=$monto&tabla4=$cuotas&tabla5=$interes&tabla6=$txtCuota&tabla7=$txtIngreso&tabla8=$txtRetiro&tabla9=$txtDescuento&tabla10=$txtSaldo&tabla11=$txtSueldo&interes=$interes");
            break;


}

$con=conectar();
$a=$_SESSION['Identity'];
$sql="SELECT * FROM prestamos WHERE cedula LIKE '%$a%'";

    if(isset($_SESSION['Identity'])){
        $id=$_SESSION['Identity'];
        $sql="SELECT * FROM prestamos WHERE cedula LIKE '%$a%'";
    }

$query=mysqli_query($con, $sql);
?>

<title>Solicitudes de Préstamos</title>

<link rel="stylesheet" href="css/gestion.css">
    <div class="nuevo">
        <u><h3>Préstamos:</h3></u>
        <br>
        <form action="./config/PDF-Prestamos.php" class="compartirs" method="post">
            <input type="hidden" name="sql" value="<?php echo $sql?>">
            <input type="submit" value="PDF" class="mt-1">
        </form>
        
        </div>

                            
        
    </div>
    <br>
<div class="tabla"> 
    <div class="col-md-12 radio">
        <table class="table align-middle rounded-circle">
        <div class="borders">
            <thead>
                
                <tr>
                    <th>Código</th>
                    <th>Cédula de Identidad</th>
                    <th>Plazo</th>
                    <th>Monto</th>
                    <th>Cuotas</th>
                    <th>Interes</th>                
                    <th>Total a Pagar</th>
                    <th>Monto x Cuota</th>                    
                    <th>Acciones</th>
                </tr>
                
            </thead>
        </div>
            <tbody>
            <?php             
            while($row=mysqli_fetch_array($query)){ 
                ?>
                <tr>
                    <td>#<?php echo $row['id'] ?></td>
                    <td><?php echo $row['cedula'] ?></td>
                    <td><?php echo $row['tipo'] ?></td>
                    <td>Bs. <?php echo number_format($row['monto'], 2, "," , ".");?></td>
                    <td><?php echo $row['cuotas'] ?></td>
                    <td><?php echo $row['interes'] ?> %</td>                   
                    <td>Bs. <?php $int2=$row['monto']*$row['interes']/100;
                    $pago=$int2+$row['monto'];
                    echo number_format($pago, 2, "," , "."); ?></td>
                    <td>Bs. <?php
                    $int2=$row['monto']*$row['interes']/100;
                    $pago=$int2+$row['monto'];
                    $pago=$pago/$row['cuotas'];
                    echo number_format($pago, 2, "," , "."); ?></td>
                    <div class="borrar">
                        <td><!--<a class="btn" href="<?php echo $url;?>/administrador/edicion.php">Detalles del Usuario</a>|-->
                        <div class="btn-group" role="group" arial-label="">
                            <form method="POST">
                                <!--<button type="submit" name="accion" value="Borrar" class="btn">Borrar</button>-->
                                <input type="hidden" name="cedula" id="cedula" value="<?php echo $row['cedula']; ?>">
                                <input type="hidden" name="tipo" id="tipo" value="<?php echo $row['tipo']; ?>">
                                <input type="hidden" name="monto" id="monto" value="<?php echo $row['monto']; ?>">
                                <input type="hidden" name="cuotas" id="cuotas" value="<?php echo $row['cuotas']; ?>">
                                <input type="hidden" name="interes" id="interes" value="<?php echo $row['interes']; ?>">                                
                                <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">                
                                <input type="submit" name="accion" value="Detalles" class="btn botona btn-outline"/>

                            </form>
                        </div>
                        </td>
                    </div>
                </tr>
            <?php } ?>
            </tbody>
        </table>        
    </div>
</div>

<?php include("./template/pie.php") ?>