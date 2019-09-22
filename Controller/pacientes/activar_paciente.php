<?php 	
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();
$id=$_POST["id_paciente"];

    $sql = "UPDATE tbl_paciente SET estado_paciente = 'activo' WHERE id_paciente='$id'";
    
    $result= $conexion->query($sql);
	if($result){
		header("Location: ../../listaPaciente.php?success=1");
	}else{
	    header("Location: ../../listaPaciente.php?error=1");
	}
$conexion->close(); 
?>