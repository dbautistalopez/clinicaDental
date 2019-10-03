<?php


require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$telCasa=$_POST["telcasa"];
$telMovil=$_POST["telmovil"];
$fechaEx=$_POST["fechaexamen"];
$edad=$_POST["edad"];
$fechaNac=$_POST["fechaNac"];
$estadoCivil=$_POST["estadoCivil"];
$ocupacion=$_POST["ocupacion"];
$recomendado=$_POST["recomendado"];
$perResp=$_POST["perResp"];
$dirPerResp=$_POST["dirPerResp"];
$medPer=$_POST["medPer"];
$telMed=$_POST["telMed"];


    $sql="Insert Into tbl_pacientes values(NULL,'$nombre','$direccion','$telCasa','$telMovil','$fechaEx','$fechaNac','$estadoCivil','$ocupacion','$recomendado','$perResp','$dirPerResp','$medPer','$telMed','activo')";

    $result= $conexion->query($sql);
    if($result){
       // echo "Producto creado satisfactoriamente <br>";
		header('Location: ../../nuevoPaciente.php?success=1');
       // echo "<a href=\"../productos.php\">Regresar</a>";
    }else{
		header("Location: ../../nuevoPaciente.php?error=1");
    }
$conexion->close();



?>
