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
$sql="select password from tbl_usuario WHERE id_usuario = '$id'";

$result=mysqli_query($conexion,$sql);
while($row=mysqli_fetch_array($result)){ 
	if ($pass == $row['password']) {
		//si los passwords coinciden
		if($password==$confirmacion){

		    $sql="UPDATE tbl_usuario SET password=SHA2('$password',256) WHERE id_usuario='$id'";
		    
		    $result= $conexion->query($sql);
		    if($result){
				header('Location: ../../usuario.php?success=1');
		    }else{
		        header('Location: ../../usuario.php?error=1');
		    }
		}else{
			header('Location: ../../usuario.php?nocoin=1');
		}

	}else{
		header('Location: ../../usuario.php?nocoin2=1');
	}
}

$conexion->close();
?>