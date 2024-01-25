<?php
$conn = mysqli_connect("localhost", "root", "", "sistema");
$host="localhost";
$bd="sistema";
$usuario="root";
$contrasenia="";
function conectar(){
    $host="localhost";    
    $usuario="root";
    $pass="";
    $contrasenia="";    

    $bd="sistema";

    $con=mysqli_connect($host,$usuario,$pass,$contrasenia);

    mysqli_select_db($con,$bd);

    return $con;
}
try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);

} catch ( Exception $ex) {

echo $ex->getMessage();
}
?>