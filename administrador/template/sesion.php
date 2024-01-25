<?php
session_start();
if($_SESSION['seguridad'] == "nivel0"){
    
        if(!isset($_SESSION['usuario'])){
            header("Location:../login.php");
        }else{

            if(($_SESSION['usuario']=="ok")){        
               $nombreUsuario=$_SESSION["nombreUsuario"];
            }
       }
}else{
    header("Location:../login.php");
}
?>