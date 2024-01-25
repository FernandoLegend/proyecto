<?php include("./template/cabecera.php") ?>
<?php include("./template/sesion.php") ?>
<?php
//settype($txtID, "integer");
$txtID=$_GET["tabla"];
$numero=$_GET["tabla"];
$txtCI=$_GET["tabla1"];
$txtApe=$_GET["tabla2"];
$txtNombre=$_GET["tabla3"];
$txtTrabajo=$_GET["tabla4"];
$txtNomina=$_GET["tabla5"];
$txtCuota=$_GET["tabla6"];
$txtIngreso=$_GET["tabla7"];
$txtRetiro=$_GET["tabla8"];
$txtDescuento=$_GET["tabla9"];
$txtSaldo=$_GET["tabla10"];
$txtSueldo=$_GET["tabla11"];

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
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
$carga=(isset($_POST['carga']))?$_POST['carga']:"";
$txtID=$_GET["tabla"];
include("config/bd.php");

$sentenciaSQL= $conexion->prepare("SELECT primero FROM traspaso");
$sentenciaSQL->execute();
//$sentenciaSQL->bindParam(':primero',$equi);
$traspaso=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
//echo $equi['primero'];
//$equi = $traspaso;

switch($accion){

    case "Actualizar":
        // $sentenciaSQL= $conexion->prepare("UPDATE afiliados SET txtID='662142223' , txtCI='albesanch@mimail.com' WHERE id=:id");
        //UPDATE afiliados SET id=:id,cedula=:cedula,apellidos=:apellidos,nombres=:nombres,trabajo=:trabajo,nomina=:nomina,cuota=:cuota,ingreso=:ingreso,retiro=:retiro,descuento=:descuento,Saldo=:Saldo WHERE 1
        //$sentenciaSQL= $conexion->prepare("UPDATE traspaso SET primero=:id");
        //$sentenciaSQL= $conexion->prepare("INSERT INTO afiliados (id, cedula, apellidos, nombres, trabajo, nomina, cuota, ingreso, retiro, descuento) VALUES (:id,:cedula,:apellidos,:nombres,:trabajo,:nomina,:cuota,:ingreso,:retiro,:descuento);");
        
        $sentenciaSQL= $conexion->prepare("UPDATE afiliados SET id=:id,cedula=:cedula,apellidos=:apellidos,nombres=:nombres,trabajo=:trabajo,nomina=:nomina,cuota=:cuota,ingreso=:ingreso,retiro=:retiro,descuento=:descuento,Saldo=:Saldo, sueldo=:sueldo WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->bindParam(':nombres',$txtNombre);
        $sentenciaSQL->bindParam(':cedula',$txtCI);
        $sentenciaSQL->bindParam(':apellidos',$txtApe);
        $sentenciaSQL->bindParam(':trabajo',$txtTrabajo);
        $sentenciaSQL->bindParam(':nomina',$txtNomina);
        $sentenciaSQL->bindParam(':cuota',$txtCuota);
        $sentenciaSQL->bindParam(':ingreso',$txtIngreso);
        $sentenciaSQL->bindParam(':retiro',$txtRetiro);
        $sentenciaSQL->bindParam(':descuento',$txtDescuento);
        $sentenciaSQL->bindParam(':Saldo',$txtSaldo);
        $sentenciaSQL->bindParam(':sueldo',$txtSueldo);


        $sentenciaSQL->execute();
        $txtNombre=$_GET["tabla3"];
        header('Location: '."gestion.php");
        
        
        break;
        
        case "carga":
        $suma = 0;
        $suma = $_GET["tabla10"]+$carga;
        $sentenciaSQL= $conexion->prepare("UPDATE afiliados SET Saldo=:Saldo WHERE id=:id");
        $sentenciaSQL->bindParam(':Saldo',$suma);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header('Location: '."gestion.php");
        
}
?>

<?php

        settype($txtID, "integer");
        $sentenciaSQL= $conexion->prepare("SELECT * FROM afiliados WHERE id=:' & $txtID & '");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $listaAfiliados=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
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
            Actualización y Consulta de datos:
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">
            
            <?php $afiliado = $listaAfiliados  ?>

                <div class = "form-group">
                    <label for="txtID">Codigo de Personal</label>
                    <input type="number" name="txtID" class="form-control" id="txtID" readonly="readonly" value="<?php echo $_GET["tabla"] ?>" placeholder="ID o Codigo">
                </div>
            
                <div class = "form-group">
                    <label for="txtCI">Número de Cédula</label>
                    <input type="number" name="txtCI" class="form-control" id="txtCI" value="<?php echo $_GET["tabla1"] ?>" placeholder="Cédula de Identidad">
                </div>

                <div class = "form-group">
                    <label for="txtApe">Apellido(s)</label>
                    <input type="text" name="txtApe" class="form-control" id="txtApe" value="<?php echo $_GET["tabla2"] ?>" placeholder="Apellido(s)">
                </div>

                <div class = "form-group">
                    <label for="txtNombre">Nombre(s)</label>
                    <input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre(s)" value="<?php echo $_GET["tabla3"] ?>">
                </div>
                <br><br><br>

                <div class = "form-group">
                    <label for="txtTrabajo">Unidad de Trabajo</label>
                    <input type="text" name="txtTrabajo" class="form-control" id="txtTrabajo" value="<?php echo $_GET["tabla4"] ?>" placeholder="Unidad de Trabajo">
                </div>

                <div class = "form-group">
                    <label for="txtNomina">Grupo de Nomina</label>
                    <select type="text" name="txtNomina" class="form-control" id="txtNomina">
                        <option value="<?php echo $_GET["tabla5"] ?>" selected><?php echo $_GET["tabla5"] ?></option>
                        <option value="Contratado">Contratado</option>                        
                        <option value="Fijo">Fijo</option>                        
                    </select>
                    <!--<input type="text" name="txtNomina" class="form-control" id="txtNomina" value="<?php //echo $_GET["tabla5"] ?>" placeholder="">-->
                </div>

                <div class = "form-group">
                    <label for="txtCuota">Cuota de Ahorro Personal</label>
                    <input type="text" name="txtCuota" class="form-control" id="txtCuota" value="<?php echo $_GET["tabla6"] ?>%" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtIngreso">Fecha de Incorporación</label>
                    <input type="date" name="txtIngreso" class="form-control" id="txtIngreso" value="<?php echo $_GET["tabla7"] ?>" placeholder="">
                </div>
                <br><br><br>
                <div class = "form-group">
                    <label for="txtSueldo">Sueldo</label>
                    <input type="text" name="txtSueldo" class="form-control" id="txtSueldo" value="<?php echo number_format($_GET["tabla11"], 2, "," , ".") ?>" placeholder="">
                </div>
                
                <div class = "form-group">
                    <label for="txtRetiro">Fecha de Retiro</label>
                    <input type="date" name="txtRetiro" class="form-control" id="txtRetiro" value="<?php echo $_GET["tabla8"] ?>" placeholder="">
                </div>
                <div class = "form-group">
                    <label for="txtDescuento">Suspender descuento</label>
                    <input type="text" name="txtDescuento" class="form-control" id="txtDescuento" value="<?php echo $_GET["tabla9"] ?>" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtSaldo">Ahorro Actual Bs.</label>
                    <input type="text" name="txtSaldo" class="form-control" id="txtSaldo" value="<?php echo number_format($_GET["tabla10"], 2, "," , ".")?>" placeholder="">
                </div>

                <div class="btn-group" role="group" arial-label="">

                <button type="submit" class="btn btn-warning">Restablecer</button>
                    <button type="submit" name="accion" value="Actualizar" class="btn btn-info">Actualizar datos</button>
                    

                </div>
            
            </form>        
            <form method="POST">
                                <!--<button type="submit" name="accion" value="Borrar" class="btn">Borrar</button>-->
                <input type="hidden" name="txtID" id="txtID" value="<?php echo $afiliado['id']; ?>">
                <input type="hidden" name="txtCI" id="txtCI" value="<?php echo $afiliado['cedula']; ?>">
                <input type="hidden" name="txtApe" id="txtApe" value="<?php echo $afiliado['apellidos']; ?>">
                <input type="hidden" name="txtNombre" id="txtNombre" value="<?php echo $afiliado['nombres']; ?>">
                <input type="hidden" name="txtTrabajo" id="txtTrabajo" value="<?php echo $afiliado['trabajo']; ?>">
                <input type="hidden" name="txtNomina" id="txtNomina" value="<?php echo $afiliado['nomina']; ?>">
                <input type="hidden" name="txtCuota" id="txtCuota" value="<?php echo $afiliado['cuota']; ?>">
                <input type="hidden" name="txtIngreso" id="txtIngreso" value="<?php echo $afiliado['ingreso']; ?>">
                <input type="hidden" name="txtRetiro" id="txtRetiro" value="<?php echo $afiliado['retiro']; ?>">
                <input type="hidden" name="txtDescuento" id="txtDescuento" value="<?php echo $afiliado['descuento']; ?>">
                <input type="hidden" name="txtSaldo" id="txtSaldo" value="<?php echo $afiliado['Saldo']; ?>">
                <input type="hidden" name="txtSueldo" id="txtSueldo" value="<?php echo $afiliado['sueldo']; ?>">
            </form>
        </div>
    </div>  
    <br><hr>
    <form method="POST">
    <input type="hidden" name="txtID" id="txtID" value="<?php echo $afiliado['id']; ?>">
    <input type="hidden" name="txtSaldo" id="txtSaldo" value="<?php echo $afiliado['Saldo']; ?>">
        <input type="number" min="1" class="compartirs col-md-2 form-control" name="carga" id="carga">
        <br>
        <button type="submit" name="accion" value="carga" class="btn btn-compartirs">Carga de Nomina</button>
    </form>
    <br><br>
</div>


<?php include("./template/pie.php") ?>