<?php
session_start();
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$id=$_POST["id_Pacientes"];
$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$tel=$_POST["tel"];

$sql="UPDATE tbl_pacientes SET nombre_Pacientes='$nombre', direccion_Pacientes='$direccion', telefonoCel='$tel' WHERE id_Pacientes='$id'";
		
$result= $conexion->query($sql);
if($result){
	header('Location: ../../listaPaciente.php?success=1');
}else{
	header('Location: ../../listaPaciente.php?error=1');
}

$conexion->close();
?>