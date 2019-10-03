<?php 	
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();
$id=$_POST["id_Pacientes"];

    $sql = "UPDATE tbl_pacientes SET estadoPaciente = 'inactivo' WHERE id_Pacientes='$id'";
    
    $result= $conexion->query($sql);
	if($result){
		header("Location: ../../listaPaciente.php?success=1");
	}else{
	    header("Location: ../../listaPaciente.php?error=1");
	}
$conexion->close(); 
?>