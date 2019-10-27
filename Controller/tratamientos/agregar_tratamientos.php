<?php
//Agregar nueva tratamiento a realizar (parte de atras de hoja de referencia)  recordar que en la base de datos se le llamo presupuestos

require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$trateco=$_POST["trateco"];
$tratamiento=$_POST["tratamiento"];
$precio=$_POST["precio"];



    $sql="Insert Into tratamientorealizar values(NULL,'1','$trateco','$tratamiento','$precio','0')";

    $result= $conexion->query($sql);
    if($result){
       // echo "Producto creado satisfactoriamente <br>";
		header('Location: ../../nuevoTratamientoaRealizar.php?success=1');
       // echo "<a href=\"../productos.php\">Regresar</a>";
    }else{
		header("Location: ../../nuevoTratamientoaRealizar.php?error=1");
    }
$conexion->close();



?>