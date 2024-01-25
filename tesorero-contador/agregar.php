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
//$ahhhhhhhhhhhhhhhhhhhhhh=$_GET["aasdad"];
//echo $hola;
//$aasdad1=$_GET["aasdad1"];


include("config/bd.php");

switch($accion){

        case "oka":

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
            ?>
            <!-- <input type="submit" hidden id="submitButton"> -->
            <?php
            break;

}
?>


<title>Agregar</title>
<link rel="stylesheet" href="css/agregar.css">

<main>
    <form action="" method="post" class="formulario" id="formulario">
        <!-- Grupo Nombre -->
        <div class="formulario__grupo" id=grupo__nombre>
            <label for="txtNombre" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
                <input type="text" required pattern="^[a-zA-ZÀ-ÿ\s]{1,40}$" class="formulario__input border" name="txtNombre" id="txtNombre" placeholder="Nombre">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe Contener Letras y espacios, pueden llevar acentos.</p>
        </div>

        <!-- Grupo Apellido -->
        <div class="formulario__grupo" id=grupo__apellido>
            <label for="txtApe" class="formulario__label">Apellido</label>
            <div class="formulario__grupo-input">
                <input type="text" required pattern="^[a-zA-ZÀ-ÿ\s]{1,40}$" class="formulario__input border" name="txtApe" id="txtApe" placeholder="Apellido">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe Contener Letras y espacios, pueden llevar acentos.</p>
        </div>

        <!-- Grupo Cedula -->
        <div class="formulario__grupo" id=grupo__cedula>
            <label for="txtCI" class="formulario__label">Cedula</label>
            <div class="formulario__grupo-input">
                <input type="number" min="1" required class="formulario__input border" name="txtCI" id="txtCI" placeholder="Cedula">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe Contener 7 a 14 numeros.</p>
        </div>

        <!-- Grupo Sueldo -->
        <div class="formulario__grupo" id=grupo__sueldo>
            <label for="txtSueldo" class="formulario__label">Sueldo</label>
            <div class="formulario__grupo-input">
                <input type="number" min="1" required class="formulario__input border" name="txtSueldo" id="txtSueldo" placeholder="Sueldo">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe Contener 7 a 14 numeros..</p>
        </div>

        <!-- Grupo Area -->
        <div class="formulario__grupo" id=grupo__area>
            <label for="txtTrabajo" class="formulario__label">Area</label>
            <div class="formulario__grupo-input">
                <input type="text" required pattern="^[a-zA-ZÀ-ÿ\s]{1,40}$" class="formulario__input border" name="txtTrabajo" id="txtTrabajo" placeholder="Area">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe Contener Letras y espacios, pueden llevar acentos.</p>
        </div>

        <!-- Grupo Nomina -->
        <div class="formulario__grupo" id=grupo__nomina>
            <label for="txtNomina" class="formulario__label">Grupo Nomina</label>
            <div class="formulario__grupo-input">
                <select type="text"  required name="txtNomina" class="form-control border" id="txtNomina">
                        <option value=""></option>
                        <option value="Contratado Tiempo Completo">Contratado Tiempo Completo</option>
                        <option value="Contratado Tiempo Convencional">Contratado Tiempo Convencional</option>
                        <option value="Ordinario Tiempo Completo">Ordinario Tiempo Completo</option>
                        <option value="Ordinario Tiempo Convencional">Ordinario Tiempo Convencional</option>
                        <option value="Incapacitado">Incapacitado</option>
                        <option value="Jubiliado">Jubiliado</option>
                        <option value="Personal Caja">Personal Caja</option>
                </select>
            </div>
        </div>

        <!-- Grupo Cuota -->
        <div class="formulario__grupo" id=grupo__cuota>
            <label for="txtCuota" class="formulario__label">Cuota de ahorro personal</label>
            <div class="formulario__grupo-input">
                <input type="number" min="1" required class="formulario__input border" name="txtCuota" id="txtCuota" placeholder="Cuota de ahorro personal">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe Contener Solo Numeros.</p>
        </div>

        <!-- Grupo Ingreso -->
        <div class="formulario__grupo" id=grupo__ingreso>
            <label for="txtIngreso" class="formulario__label">Ingreso</label>
            <div class="formulario__grupo-input">
                <input type="date" required class="formulario__input border" name="txtIngreso" id="txtIngreso" placeholder="Ingreso">
            </div>
        </div>


        <!-- Grupo Retiro -->
        <div class="formulario__grupo" id=grupo__retiro>
            <label for="txtRetiro" class="formulario__label">Retiro</label>
            <div class="formulario__grupo-input">
                <input type="date" required class="formulario__input border" name="txtRetiro" id="txtRetiro" placeholder="Retiro">
            </div>
        </div>

        <!-- Grupo Descuento -->
        <div class="formulario__grupo" id=grupo__descuento>
            <label for="txtDescuento" class="formulario__label">Descuento</label>
            <div class="formulario__grupo-input">
                <input type="text" required pattern="^[a-zA-ZÀ-ÿ\s]{1,40}$" class="formulario__input border" name="txtDescuento" id="txtDescuento"
                    placeholder="Descuento">
                <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Debe contener solo 2 digitos numericos</p>
        </div>

        <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente.
            </p>
        </div>

        <div class="formulario__grupo formulario__grupo-btn-enviar">
            <button type="submit" class="formulario__btn" value="oka" name="accion" id="accion">Enviar</button>
            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario se envio correctamente!</p>
        </div>
    </form>
</main>
<!-- <script src="js/formulario.js"></script> -->
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<?php include("./template/pie.php") ?>