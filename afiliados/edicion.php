<?php include("./template/cabecera.php");
include("config/bd.php");
include("./template/sesion.php"); ?>
<?php

$records = $conexion->prepare('SELECT * FROM afiliados WHERE cedula=:contrasenia') ;
$records->bindParam(':contrasenia',$_SESSION['Identity']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
        
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

            <form>

                <div class = "form-group">
                    <label for="txtID">Codigo de Personal</label>
                    <input type="number" name="txtID" class="form-control" id="txtID" readonly="readonly" value="<?php echo $results['id'] ?>" placeholder="ID o Codigo">
                </div>
            
                <div class = "form-group">
                    <label for="txtCI">Número de Cédula</label>
                    <input type="number" name="txtCI" class="form-control" id="txtCI" readonly value="<?php echo $results['cedula'] ?>" placeholder="Cédula de Identidad">
                </div>

                <div class = "form-group">
                    <label for="txtApe">Apellido(s)</label>
                    <input type="text" name="txtApe" class="form-control" id="txtApe" readonly value="<?php echo $results['apellidos'] ?>" placeholder="Apellido(s)">
                </div>

                <div class = "form-group">
                    <label for="txtNombre">Nombre(s)</label>
                    <input type="text" name="txtNombre" class="form-control" id="txtNombre" readonly placeholder="Nombre(s)" value="<?php echo $results['nombres'] ?>">
                </div>
                <br><br><br>

                <div class = "form-group">
                    <label for="txtTrabajo">Unidad de Trabajo</label>
                    <input type="text" name="txtTrabajo" class="form-control" id="txtTrabajo" readonly value="<?php echo $results['trabajo'] ?>" placeholder="Unidad de Trabajo">
                </div>

                <div class = "form-group">
                    <label for="txtNomina">Grupo de Nomina</label>
                    <input type="text" name="txtNomina" class="form-control" id="txtNomina" readonly value="<?php echo $results['nomina'] ?>" placeholder="Unidad de Trabajo">
                    
                </div>

                <div class = "form-group">
                    <label for="txtCuota">Cuota de Ahorro Personal</label>
                    <input type="text" name="txtCuota" class="form-control" id="txtCuota" readonly value="<?php echo $results['cuota'] ?>" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtIngreso">Fecha de Incorporación</label>
                    <input type="date" name="txtIngreso" class="form-control" id="txtIngreso" readonly value="<?php echo $results['ingreso'] ?>" placeholder="">
                </div>
                <br><br><br>
                <div class = "form-group">
                    <label for="txtSueldo">Sueldo</label>
                    <input type="text" name="txtSueldo" class="form-control" id="txtSueldo" readonly value="<?php echo number_format($results["sueldo"], 2, "," , ".") ?>" placeholder="">
                </div>
                
                <div class = "form-group">
                    <label for="txtRetiro">Fecha de Retiro</label>
                    <input type="date" name="txtRetiro" class="form-control" id="txtRetiro" readonly value="<?php echo $results['retiro'] ?>" placeholder="">
                </div>
                <div class = "form-group">
                    <label for="txtDescuento">Suspender descuento</label>
                    <input type="text" name="txtDescuento" class="form-control" id="txtDescuento" readonly value="<?php echo $results['descuento'] ?>" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtSaldo">Ahorro Actual Bs.</label>
                    <input type="text" name="txtSaldo" class="form-control" id="txtSaldo" readonly value="<?php echo number_format($results["Saldo"], 2, "," , ".")?>" placeholder="">
                </div>
<br>
                <div class="btn-group" role="group" arial-label="">

                </div>            
            </form>
        </div>
    </div>  
</div>


<?php include("./template/pie.php") ?>