<?php
//Agregar nueva pieza  recordar que en la base de datos se le llamo presupuestos

require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$nombrecc=$_POST["nombre"];
$descc=$_POST["descripcion"];

//aqui faltaria poner lo del Id del paciente que dependeria de la sesion
    $sql="Insert Into tbl_cclinico values(NULL,'$nombrecc','$descc')";

    $result= $conexion->query($sql);
    if($result){
       // echo "Producto creado satisfactoriamente <br>";
		header('Location: ../../ccnuevo.php?success=1');
       // echo "<a href=\"../productos.php\">Regresar</a>";
    }else{
		header("Location: ../../ccnuevo.php?error=1");
    }
$conexion->close();



?>