<?php include("./template/cabecera.php") ?>
<?php include("./template/sesion.php") ?>
<?php
include("config/bd.php");
settype($txtID, "integer");
settype($busqueda, "integer");
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$busqueda=(isset($_POST['busqueda']))?$_POST['busqueda']:"";
$txtCI=(isset($_POST['txtCI']))?$_POST['txtCI']:"";
$txtApe=(isset($_POST['txtApe']))?$_POST['txtApe']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtTrabajo=(isset($_POST['txtTrabajo']))?$_POST['txtTrabajo']:"";
$txtNomina=(isset($_POST['txtNomina']))?$_POST['txtNomina']:"";
$txtCuota=(isset($_POST['txtCuota']))?$_POST['txtCuota']:"";
$txtIngreso=(isset($_POST['txtIngreso']))?$_POST['txtIngreso']:"";
$txtRetiro=(isset($_POST['txtRetiro']))?$_POST['txtRetiro']:"";
$txtDescuento=(isset($_POST['txtDescuento']))?$_POST['txtDescuento']:"";
$txtSaldo=(isset($_POST['txtSaldo']))?$_POST['txtSaldo']:"";
$txtSueldo=(isset($_POST['txtSueldo']))?$_POST['txtSueldo']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $traspaso=(isset($_POST['txtID']))?$_POST['txtID']:"";
    
    switch($accion){

        case "Borrar":
            $sentenciaSQL= $conexion->prepare("DELETE FROM afiliados WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            //echo "Boton: Borrar";
            break;

        case "Detalles del Usuario":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM afiliados WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $sentenciaSQL->bindParam(':cedula',$txtCI);
            
            $sentenciaSQL->execute();
            $listarows=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $sentenciaSQL= $conexion->prepare("UPDATE traspaso SET primero=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            header('Location: '."edicion.php?tabla=$txtID&tabla1=$txtCI&tabla2=$txtApe&tabla3=$txtNombre&tabla4=$txtTrabajo&tabla5=$txtNomina&tabla6=$txtCuota&tabla7=$txtIngreso&tabla8=$txtRetiro&tabla9=$txtDescuento&tabla10=$txtSaldo&tabla11=$txtSueldo");
            break;


}

$con=conectar();
$sql="SELECT * FROM afiliados";

    if(isset($_POST['buscar'])){
        $cedula=$_POST['busqueda'];
        $sql="SELECT * FROM afiliados WHERE cedula LIKE '%$cedula%'";
    }

$query=mysqli_query($con, $sql);
?>

<title>Gestion de Afiliados</title>

<link rel="stylesheet" href="css/gestion.css">
    <div class="nuevo">
        <u><h3>Afiliados:</h3></u>        
        <div class="nuevo compartirs">
            <p><a name="" id="" class="btn btn-info" href="<?php echo $url;?>/administrador/agregar.php" role="button">Nuevo Usuario +</a></p>
        </div>
        <form action="gestion.php" class="compartirs" method="post">
            <input type="number" class="compartirs col-md-6 form-control" name="busqueda" placeholder="Búsqueda por Cédula">
            <br><br>
            <input type="submit" class="compartirs" value="Buscar" name="buscar">
            <input type="submit" value="Limpiar">
        </form>
        <form action="./config/PDF.php" class="compartirs" method="post">
            <input type="hidden" name="sql" value="<?php echo $sql?>">
            <input type="submit" value="PDF" class="mt-1">
        </form>
        <br><br>
        </div>
    </div>
<div class="tabla"> 
    <div class="col-md-12 radio">
        <table class="table align-middle rounded-circle">
        <div class="borders">
            <thead>
                
                <tr>
                    <th>Código</th>
                    <th>Cédula de Identidad</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Sueldo</th>
                    <th>Ahorro</th>
                    <th>Nomina</th>
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
                    <td><?php echo $row['nombres'] ?></td>
                    <td><?php echo $row['apellidos'] ?></td>
                    <td>Bs. <?php echo number_format($row['sueldo'], 2, "," , ".")?></td>
                    <td>Bs. <?php echo number_format($row['Saldo'], 2, "," , ".") ?></td>
                    <td><?php echo $row['nomina'] ?></td>
                    <div class="borrar">
                        <td><!--<a class="btn" href="<?php echo $url;?>/administrador/edicion.php">Detalles del Usuario</a>|-->
                        <div class="btn-group" role="group" arial-label="">
                            <form method="POST">
                                <!--<button type="submit" name="accion" value="Borrar" class="btn">Borrar</button>-->
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="txtCI" id="txtCI" value="<?php echo $row['cedula']; ?>">
                                <input type="hidden" name="txtApe" id="txtApe" value="<?php echo $row['apellidos']; ?>">
                                <input type="hidden" name="txtNombre" id="txtNombre" value="<?php echo $row['nombres']; ?>">
                                <input type="hidden" name="txtTrabajo" id="txtTrabajo" value="<?php echo $row['trabajo']; ?>">
                                <input type="hidden" name="txtNomina" id="txtNomina" value="<?php echo $row['nomina']; ?>">
                                <input type="hidden" name="txtCuota" id="txtCuota" value="<?php echo $row['cuota']; ?>">
                                <input type="hidden" name="txtIngreso" id="txtIngreso" value="<?php echo $row['ingreso']; ?>">
                                <input type="hidden" name="txtRetiro" id="txtRetiro" value="<?php echo $row['retiro']; ?>">
                                <input type="hidden" name="txtDescuento" id="txtDescuento" value="<?php echo $row['descuento']; ?>">
                                <input type="hidden" name="txtSaldo" id="txtSaldo" value="<?php echo $row['Saldo']; ?>">
                                <input type="hidden" name="txtSueldo" id="txtSueldo" value="<?php echo $row['sueldo']; ?>">
                                <input type="submit" name="accion" value="Detalles del Usuario" class="btn botona btn-outline"/>        |                                
                                <input type="submit" name="accion" value="Borrar" class="btn botonb btn-outline" onclick="return eliminar()"/>
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
<script src="../confirmar.js"></script>
<?php include("./template/pie.php") ?>