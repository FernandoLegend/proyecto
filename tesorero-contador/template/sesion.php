<?php
session_start();
if($_SESSION['seguridad'] == "nivel2"){
    
        if(!isset($_SESSION['usuario'])){
            header("Location:../login.php");
        }else{

            if(($_SESSION['usuario']=="koe")){        
               $nombreUsuario=$_SESSION["nombreUsuario"];
            }
       }
}else{
    header("Location:../login.php");
}
?>