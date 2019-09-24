<?php
session_start();
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$id=$_POST["id_paciente"];
$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$tel=$_POST["tel"];

$sql="UPDATE tbl_paciente SET nombre_paciente='$nombre', direccion_paciente='$direccion', telmovil_paciente='$tel' WHERE id_paciente='$id'";
		
$result= $conexion->query($sql);
if($result){
	header('Location: ../../listaPaciente.php?success=1');
}else{
	header('Location: ../../listaPaciente.php?error=1');
}

$conexion->close();
?>