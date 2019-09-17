<?php
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$nombre=$_POST["paciente"];
$telCont=$_POST["telCont"];
$fechaCita=$_POST["fechaCita"];
$descripcion=$_POST["descripcion"];

    $sql="Insert Into tbl_cita values(NULL,'$nombre','$telCont','$fechaCita','$descripcion','activo')";

    $result= $conexion->query($sql);
    if($result){
       // echo "Producto creado satisfactoriamente <br>";
		header('Location: ../../nuevaCita.php?success=1');
       // echo "<a href=\"../productos.php\">Regresar</a>";
    }else{
		header("Location: ../../nuevaCita.php?error=1");
    }
$conexion->close();
?>
