<?php
session_start();
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$usuario=$_POST["usuario"];
$password=$_POST["password"];

$sql="Select * from tbl_usuario where username='$usuario' and password=SHA2('$password',256)";
$result2=$conexion->query($sql);

if($result2->num_rows==1){
    $row = $result2->fetch_array();
    if(!isset($_SESSION["usuario"])){
        $_SESSION["id"]=$row["id_usuario"];
        $_SESSION["usuario"]=$row["username"];
        $_SESSION["nombre"]=$row["nombre_usuario"];
        $_SESSION["password"]=$row["password"];
        $_SESSION["estado"]=$row["estado_usuario"];
        $_SESSION["rol"]=$row["id_rol"];
    }

    $result2->free();
    $conexion->close();
    header("Location: ../../index.php");
    exit(); //Siempre que se tiene que redirigir hay que cerrar, sino seguirá ejecutando código
}else{
    $result2->free();
    $conexion->close();
    header("Location: ../../login.php?error=1");
    exit();
}



//hash("sha256",$password);   

?>