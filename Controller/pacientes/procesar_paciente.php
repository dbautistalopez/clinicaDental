<?php
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$telCasa=$_POST["telcasa"];
$telMovil=$_POST["telmovil"];
$fechaEx=$_POST["fechaexamen"];
$fechaNac=$_POST["fechaNac"];
$estadoCivil=$_POST["estadoCivil"];
$ocupacion=$_POST["ocupacion"];
$recomendado=$_POST["recomendado"];
$perResp=$_POST["perResp"];
$dirPerResp=$_POST["dirPerResp"];
$medPer=$_POST["medPer"];
$telMed=$_POST["telMed"];
$nameimagen = $_FILES['imagen']['name'];
$tmpimagen = $_FILES['imagen']['tmp_name'];
$ruta = "img/fotos";

$ruta=$ruta."/".$nameimagen;

move_uploaded_file($tmpimagen,$ruta);

    $sql="Insert Into tbl_pacientes values(NULL,'$nombre','$direccion','$telCasa','$telMovil','$fechaEx','$fechaNac','$estadoCivil','$ocupacion','$recomendado','$perResp',NULL,'$dirPerResp','$medPer','$telMed','$ruta','activo')";

    $result= $conexion->query($sql);
    if($result){
		header('Location: ../../selectCC.php?success=1');
    }else{
		header("Location: ../../nuevoPaciente.php?error=1");
    }
$conexion->close();



?>
