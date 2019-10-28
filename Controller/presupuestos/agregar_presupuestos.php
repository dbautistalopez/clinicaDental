<?php
//Agregar tratamiento recomendado, recordar que en la base de datos se le llamo presupuestos

require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$nopieza=$_POST["nopieza"];
$tratamiento=$_POST["tratamiento"];
$precio=$_POST["precio"];
$paciente=$_POST["id_paciente"];

//aqui faltaria poner lo del Id del paciente que dependeria de la sesion
    $sql="Insert Into tbl_presupuestos values(NULL,'$nopieza','$paciente','$tratamiento')";

    $result= $conexion->query($sql);
    if($result){
       // echo "Producto creado satisfactoriamente <br>";
		header('Location: ../../listaPaciente.php');
       // echo "<a href=\"../productos.php\">Regresar</a>";
    }else{
		header("Location: ../../nuevoPresupuesto.php?error=1");
    }
$conexion->close();



?>
