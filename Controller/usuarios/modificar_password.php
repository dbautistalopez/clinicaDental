<?php
session_start();
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$id=$_POST["id_usuario"];
$pass=$_POST["passvieja"];
$password=$_POST["password"];
$confirmacion=$_POST["confirmacion"];

//si las contraseña actual y la entrada del usuario conciden
if (hash('sha256', $pass) == $_SESSION["password"]) {
		//si los passwords coinciden
		if($password==$confirmacion){

		    $sql="UPDATE tbl_usuario SET password=SHA2('$password',256) WHERE id_usuario='$id'";
		    
		    $result= $conexion->query($sql);
		    if($result){
				header('Location: ../../cerrarsesion.php');
		    }else{
		        header('Location: ../../perfil.php?error=1');
		    }
		}else{
			header('Location: ../../perfil.php?nocoin=1');
		}
}else{
	header('Location: ../../perfil.php?nocoin2=1');
}

$conexion->close();
?>