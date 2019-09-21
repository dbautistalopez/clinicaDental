<?php
session_start();
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$id=$_POST["id_usuario"];
$nombre=$_POST["nombre"];
$usuario=$_POST["usuario"];
$rol=$_POST["rol"];

	$sql="UPDATE tbl_usuario SET nombre_usuario='$nombre', username='$usuario', id_rol='$rol' WHERE id_usuario='$id'";
		    
	$result= $conexion->query($sql);
	if($result){
		header('Location: ../../usuario.php?success=1');
	}else{
		header('Location: ../../usuario.php?error=1');
	}


$conexion->close();
?>