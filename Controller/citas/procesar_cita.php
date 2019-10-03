<?php
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();


$fechaCita=$_POST["fechaProgramada"];
$horaCita=$_POST["hora"];
$descripcion=$_POST["descripcionCita"];

    $sql="Insert Into tbl_citas values(NULL,'$fechaCita','$horaCita','$descripcion','activo')";

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
