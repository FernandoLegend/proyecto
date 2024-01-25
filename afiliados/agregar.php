<?php include("./template/cabecera.php") ?>
<?php include("./template/sesion.php") ?>
<?php
settype($txtID, "integer");
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
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("config/bd.php");

switch($accion){

        case "Agregar":

            $sentenciaSQL= $conexion->prepare("INSERT INTO afiliados (id, cedula, apellidos, nombres, trabajo, nomina, cuota, ingreso, retiro, descuento, sueldo) VALUES (:id,:cedula,:apellidos,:nombres,:trabajo,:nomina,:cuota,:ingreso,:retiro,:descuento,:sueldo);");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->bindParam(':cedula',$txtCI);
            $sentenciaSQL->bindParam(':apellidos',$txtApe);
            $sentenciaSQL->bindParam(':nombres',$txtNombre);
            $sentenciaSQL->bindParam(':trabajo',$txtTrabajo);
            $sentenciaSQL->bindParam(':nomina',$txtNomina);
            $sentenciaSQL->bindParam(':cuota',$txtCuota);
            $sentenciaSQL->bindParam(':ingreso',$txtIngreso);
            $sentenciaSQL->bindParam(':retiro',$txtRetiro);
            $sentenciaSQL->bindParam(':descuento',$txtDescuento);
            $sentenciaSQL->bindParam(':sueldo',$txtSueldo);
            $sentenciaSQL->execute();            
            break;

}

?>


<title>Agregar</title>
<link rel="stylesheet" href="css/agregar.css">
<div class="orden">
    <div class="card">
        <div class="card-header">
            Agregar Nuevo Usuario:
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" >

                <!--<div class = "form-group">
                    <label for="txtID">Codigo de Persona</label>
                    <input type="hidden" name="txtID" class="form-control" id="txtID" placeholder="ID o Codigo">
                </div>-->

                <div class = "form-group">
                    <label for="txtCI">Número de Cédula *</label>
                    <input required type="number" max="99999999" min="1" name="txtCI" class="form-control" id="txtCI" placeholder="Cédula de Identidad">
                </div>
                                
                <div class = "form-group">
                    <label for="txtApe">Apellido(s) *</label>
                    <input type="text" required name="txtApe"  pattern="[A-Za-z-Ñ-ñ]+" class="form-control" id="txtApe" placeholder="Apellido(s)">
                </div>
                
                <div class = "form-group">
                    <label for="txtNombre">Nombre(s) *</label>
                    <input type="text" required pattern="[A-Za-z-Ñ-ñ]+"  name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre(s)">
                </div>
                <br><br><br><br>
                <div class = "form-group">
                    <label for="txtTrabajo">Área *</label>
                    <input type="text" required pattern="[A-Za-z-Ñ-ñ]+" name="txtTrabajo" class="form-control" id="txtTrabajo" placeholder="Unidad de Trabajo">
                </div>

                <div class = "form-group">
                    <label for="txtNomina">Grupo de Nomina *</label>
                    <select type="text"  pattern="[A-Za-z-Ñ-ñ]+" name="txtNomina" class="form-control" id="txtNomina">
                        <option value="Contratado">Contratado</option>
                        <option value="Fijo">Fijo</option>                        
                    </select>
                    
                    <!--<input type="text" name="txtNomina" class="form-control" id="txtNomina" placeholder="">-->
                </div>

                <div class = "form-group">
                    <label for="txtCuota">Cuota de Ahorro Personal *</label>
                    <input type="number" min="1" required name="txtCuota" class="form-control" id="txtCuota" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtIngreso">Fecha de Incorporación *</label>
                    <input type="date" required name="txtIngreso" class="form-control" id="txtIngreso" placeholder="">
                </div>
                <br><br><br><br>
                <div class = "form-group">
                    <label for="txtSueldo">Sueldo *</label>
                    <input type="number" required min="1" name="txtSueldo" class="form-control" id="txtSueldo" placeholder="">
                </div>

                <div class = "form-group">
                    <label for="txtRetiro">Fecha de Retiro *</label>
                    <input type="date" required name="txtRetiro" class="form-control" id="txtRetiro" placeholder="">
                </div>
                <div class = "form-group">
                    <label for="txtDescuento">Suspender descuento *</label>
                    <input type="text" required pattern="[A-Za-z-Ñ-ñ]+" name="txtDescuento" class="form-control" id="txtDescuento" placeholder="">
                </div>
                
                <div class="btn-group" role="group" arial-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-warning">Agregar +</button>                     
                </div>                
            </form>        
        </div>
    </div>  
</div>
<?php include("./template/pie.php") ?>