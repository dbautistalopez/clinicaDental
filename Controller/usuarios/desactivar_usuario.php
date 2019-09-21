<?php 	
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();
$id=$_POST["id_usuario"];

    $sql = "UPDATE tbl_usuario SET estado_usuario = 'inactivo' WHERE id_usuario='$id'";
    
    $result= $conexion->query($sql);
	if($result){
		header("Location: ../../usuario.php?success=1");
	}else{
	    header("Location: ../../usuario.php?error=1");
	}
$conexion->close();
?>