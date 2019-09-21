<?php
session_start();
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$id=$_POST["id_usuario"];
$nombre=$_POST["nombre"];
$usuario=$_POST["usuario"];
$pass=$_POST["passvieja"];
//$rol=$_POST["rol"];

//si las contraseña actual y la entrada del usuario conciden
if (hash('sha256', $pass) == $_SESSION["password"]) {

	$sql="UPDATE tbl_usuario SET nombre_usuario='$nombre', username='$usuario' WHERE id_usuario='$id'";
		    
	$result= $conexion->query($sql);
	if($result){
		header('Location: ../../perfil.php?success=1');
	}else{
		header('Location: ../../perfil.php?error=1');
	}

}else{
	header('Location: ../../perfil.php?nocoin2=1');
}

$conexion->close();
?>