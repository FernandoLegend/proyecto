<?php include("./template/cabecera.php") ?>
<?php include("./template/sesion.php") ?>
<?php
//settype($txtID, "integer");
$id=$_GET["tabla"];
$cedula=$_GET["tabla"];
$tipo=$_GET["tabla1"];
$monto=$_GET["tabla2"];
$cuotas=$_GET["tabla3"];
// $interes=$_GET['interes'];
//$int3
settype($int3, "float");
//$interes=$_GET["tabla5"];
date_default_timezone_set('America/Caracas');
$GLOBALS['fecha']=date("Y-m-d");
$clave=(isset($_POST['clave']))?$_POST['clave']:"";
$cota=(isset($_POST['pago']))?$_POST['pago']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$interes=(isset($_POST['interes']))?$_POST['interes']:"";
$id=(isset($_POST['id']))?$_POST['id']:"";
$cedula=(isset($_POST['cedula']))?$_POST['cedula']:"";
$tipo=(isset($_POST['tipo']))?$_POST['tipo']:"";
$monto=(isset($_POST['monto']))?$_POST['monto']:"";
$cuotas=(isset($_POST['cuotas']))?$_POST['cuotas']:"";
$txtCuota=(isset($_POST['txtCuota']))?$_POST['txtCuota']:"";
$txtIngreso=(isset($_POST['txtIngreso']))?$_POST['txtIngreso']:"";
$txtRetiro=(isset($_POST['txtRetiro']))?$_POST['txtRetiro']:"";
$txtDescuento=(isset($_POST['txtDescuento']))?$_POST['txtDescuento']:"";
$txtSaldo=(isset($_POST['txtSaldo']))?$_POST['txtSaldo']:"";
$txtSueldo=(isset($_POST['txtSueldo']))?$_POST['txtSueldo']:"";
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$estado=(isset($_POST['estado']))?$_POST['estado']:"";


include("config/bd.php");
//$con=conectar();
// $sentenciaSQL= $conexion->prepare("SELECT `primero` FROM `traspaso` WHERE 1");
// $sentenciaSQL->execute();
// $traspaso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
// $valor_primero = $traspaso['primero'];

                    // $sql = $conexion->prepare("SELECT primero FROM traspaso");
                    // $sql->execute();
                    // $traspaso = $sql->fetch(PDO::FETCH_ASSOC);
                    
//echo $equi['primero'];
//$equi = $traspaso;

switch($accion){

    case "Pagar":
        // $sentenciaSQL= $conexion->prepare("UPDATE afiliados SET txtID='662142223' , txtCI='albesanch@mimail.com' WHERE id=:id");
        //UPDATE afiliados SET id=:id,cedula=:cedula,apellidos=:apellidos,nombres=:nombres,trabajo=:trabajo,nomina=:nomina,cuota=:cuota,ingreso=:ingreso,retiro=:retiro,descuento=:descuento,Saldo=:Saldo WHERE 1
        //$sentenciaSQL= $conexion->prepare("UPDATE traspaso SET primero=:id");
        //$sentenciaSQL= $conexion->prepare("INSERT INTO afiliados (id, cedula, apellidos, nombres, trabajo, nomina, cuota, ingreso, retiro, descuento) VALUES (:id,:cedula,:apellidos,:nombres,:trabajo,:nomina,:cuota,:ingreso,:retiro,:descuento);");
        
        
        if($estado=='Por pagar'){

            $cota=$cota*$_GET["tabla5"]/100;

            $sentenciaSQL= $conexion->prepare("INSERT INTO traspaso (prueba) VALUES (:pago);");
            $sentenciaSQL->bindParam(':pago',$cota);
            $sentenciaSQL->execute();

            $sentenciaSQL= $conexion->prepare("SELECT * FROM cuotas WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$id);
            $sentenciaSQL->execute();
            $cancelado="Cancelada";

            $sentenciaSQL= $conexion->prepare("UPDATE cuotas SET estado=:Cancelado, fecha=:fecha WHERE id=:id AND estado='Por pagar'");
            $fecha = $GLOBALS['fecha'];
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->bindParam(':Cancelado',$cancelado);
            $sentenciaSQL->bindParam(':fecha',$fecha);
            $sentenciaSQL->execute();
            
            // $localizador=1;

            // $consulta = $conexion->prepare("SELECT primero FROM traspaso WHERE id = :localizador");
            // $consulta->bindValue(':localizador', $localizador);
            // $consulta->execute();
            // $valor = $consulta->fetch(PDO::FETCH_COLUMN);
            // $consulta->closeCursor();
            // echo $valor;
            // $suma=$valor+$cota;

            // $sentenciaSQL= $conexion->prepare("UPDATE traspaso SET primero=:suma WHERE id = :localizador");
            // $sentenciaSQL->bindParam(':localizador', $localizador);
            // $sentenciaSQL->bindParam(':suma',$suma);
            // $sentenciaSQL->execute();
        }
        
        
        
        
        //header('Location: '."edicion.php?tabla=$txtID&tabla1=$txtCI&tabla2=$txtApe&tabla3=$txtNombre&tabla4=$txtTrabajo&tabla5=$txtNomina&tabla6=$txtCuota&tabla7=$txtIngreso&tabla8=$txtRetiro&tabla9=$txtDescuento&tabla10=$txtSaldo&tabla11=$txtSueldo");

        // Sentencia SQL
        // $sql = "SELECT primero FROM traspaso";

        // Ejecutar la sentencia y obtener los resultados
        // $result = mysqli_query($conn, $sql);
        // Obtener el valor del campo
        // $row = mysqli_fetch_assoc($result);
        // $valor = $row['primero'];

        // Mostrar el valor del campo

        // $caso=$interes/100;
        // $cota=$cota*$caso;
        // echo $primero;
        // echo $cota;
        // $primero=$primero+$cota;
        //         //mysqli_close($conn);
        // $sentenciaSQL= $conexion->prepare("UPDATE traspaso SET primero=:pago");
        // $sentenciaSQL->bindParam(':pago',$primero);
        
        
        break;
        
}
$idafiliado=$_GET["tabla"];
$con=conectar();
$sql="SELECT * FROM cuotas WHERE clave LIKE '%$idafiliado%'";

$query=mysqli_query($con, $sql);

$con1=conectar();
$sql1="SELECT `primero` FROM `traspaso`";
$query1=mysqli_query($con1, $sql1);

?>

<?php

        settype($txtID, "integer");
        $sentenciaSQL= $conexion->prepare("SELECT * FROM afiliados WHERE id=:' & $txtID & '");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $listaAfiliados=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        
        $conta=1;
        $sentenciaSQL1= $conexion->prepare("SELECT * FROM traspaso WHERE conta=:conta");
        $sentenciaSQL1->bindParam(':conta',$conta);
        $sentenciaSQL1->execute();
        $sqltraspaso=$sentenciaSQL1->fetch(PDO::FETCH_LAZY);
?>

<!--//$sentenciaSQL= $conexion->prepare("SELECT * FROM afiliados WHERE id=:id");
//$sentenciaSQL->bindParam(':id',$txtID);
//$sentenciaSQL->execute();
//$listaAfiliados=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

?>-->



<br>

<title>Edicion</title>
<link rel="stylesheet" href="css/edicion.css">
<div class="orden">
    <div class="card">
        <div class="card-header">
            Consulta de datos:
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">
            
            <?php 
            $afiliado = $listaAfiliados;
            ?>

                <div class = "form-group">
                    <label for="txtID">Codigo del Prestamo</label>
                    <input type="number" readonly name="id" class="form-control" id="id" readonly="readonly" value="<?php echo $_GET["tabla"] ?>" placeholder="ID o Codigo">
                </div>
            
                <div class = "form-group">
                    <label for="txtCI">Número de Cédula</label>
                    <input type="number" readonly name="cedula" class="form-control" id="cedula" value="<?php echo $_GET["tabla1"] ?>" placeholder="Cédula de Identidad">
                </div>

                <div class = "form-group">
                    <label for="txtApe">Plazo</label>
                    <input type="text" readonly name="txtApe" class="form-control" id="txtApe" value="<?php echo $_GET["tabla2"] ?>" placeholder="Apellido(s)">
                </div>

                <div class = "form-group">
                    <label for="txtNombre">Valor del Prestamo</label>
                    <input type="text" readonly name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre(s)" value="<?php  echo number_format($_GET["tabla3"], 2, "," , ".")  ?>">
                </div>
                <br><br><br>

                <div class = "form-group">
                    <label for="txtTrabajo">Cutoas</label>
                    <input type="text" readonly name="txtTrabajo" class="form-control" id="txtTrabajo" value="<?php echo $_GET["tabla4"] ?>" placeholder="Unidad de Trabajo">
                </div>

                <div class = "form-group">
                    <label for="txtNomina">Interes</label>
                    <input type="text" readonly name="txtNomina" class="form-control" value="<?php echo $_GET["tabla5"] ?> %" id="txtNomina">                                            
                    <!--<input type="text" name="txtNomina" class="form-control" id="txtNomina" value="<?php //echo $_GET["tabla5"] ?>" placeholder="">-->
                </div>
                <?php $int2=$_GET['tabla3']*$_GET['tabla5']/100;
                    $pago=$int2+$_GET['tabla3'];
                    $tt=$pago;                  
                    $int2=$_GET['tabla3']*$_GET['tabla5']/100;
                    $pago=$int2+$_GET['tabla3'];
                    $pago=$pago/$_GET['tabla4'];?>
                <div class = "form-group">
                    <label for="txtCuota">Monto x Cuota</label>
                    <input type="text" name="txtCuota" class="form-control" readonly id="txtCuota" value="<?php echo number_format($pago, 2, "," , "."); ?>" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtIngreso">Total a Pagar</label>
                    <input type="text" name="txtIngreso" class="form-control" readonly id="txtIngreso" value="<?php echo number_format($tt, 2, "," , "."); ?>" placeholder="">
                </div>
                <br><br><br>
                
                    <!--<button type="submit" name="accion" value="Actualizar" class="btn btn-info">Vista de Cuotas</button>-->
                    

                </div>
            
            </form>        
            <form method="POST">
                                <!--<button type="submit" name="accion" value="Borrar" class="btn">Borrar</button>-->
                <!-- <input type="hidden" name="txtID" id="txtID" value="<?php echo $row['id']; ?>"> -->
                <input type="hidden" name="id" id="id" value="<?php echo $afiliado['id']; ?>">
                <input type="hidden" name="cedula" id="cedula" value="<?php echo $afiliado['cedula']; ?>">
                <input type="hidden" name="tipo" id="tipo" value="<?php echo $afiliado['apellidos']; ?>">
                <input type="hidden" name="monto" id="monto" value="<?php echo $afiliado['nombres']; ?>">
                <input type="hidden" name="cuotas" id="cuotas" value="<?php echo $afiliado['trabajo']; ?>">
                <input type="hidden" name="interes" id="interes" value="<?php echo $afiliado['nomina']; ?>">
            </form>
        </div>
    </div>  
</div>
<br><br>
<div class="tabla"> 
    <div class="col-md-12 radio">
        <table class="table align-middle rounded-circle">
        <div class="borders">
            <thead>
                
                <tr>
                    <th>Código</th>
                    <th>Cédula de Identidad</th>
                    <th>Estado</th>
                    <th>Monto</th>
                    <th>Fecha de Cancelación</th>
                </tr>
                
            </thead>
        </div>
            <tbody>
            <?php             
            while($row=mysqli_fetch_array($query)){ 
                $cota=$row['pago'];
                ?>
                <tr>
                    <td>#<?php echo $row['id'] ?></td>
                    <td><?php echo $row['cedula'] ?></td>
                    <td><?php echo $row['estado'] ?></td>
                    <td>Bs. <?php echo number_format($row['pago'], 2, "," , ".")?></td>
                    <td><?php echo $row['fecha'] ?></td>                    
                    <div class="borrar">
                        <td>
                            <form method="POST">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="pago" id="pago" value="<?php echo $row['pago']; ?>">
                                <input type="hidden" name="int3" id="int3" value="<?php echo $row['pago']; ?>">
                                <input type="hidden" name="clave" id="clave" value="<?php echo $row['clave']; ?>">
                                <input type="hidden" name="txtSueldo" id="txtSueldo" value="<?php echo $row['sueldo']; ?>">
                                <input type="hidden" name="estado" id="estado" value="<?php echo $row['estado']; ?>">
                                <input type="hidden" name="interes" id="interes" value="<?php echo $row['interes']; ?>">
                            </form>
                        </td>
                    </div>
                </tr>
            <?php } 
             ?>
                    <!-- // $sql= $conexion->prepare("SELECT primero FROM traspaso");
                    // $resultado = $conn->query($sql);
                    // $fila = $resultado->fetch_assoc();
                    // echo $fila; -->
            </tbody>
        </table>
    </div>
</div>
<?php include("./template/pie.php") ?>