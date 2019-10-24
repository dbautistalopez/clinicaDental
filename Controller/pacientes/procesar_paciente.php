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

$imgFile = $_FILES["foto"]["name"];
$tmp_dir = $_FILES["foto"]["tmp_name"];
$imgSize = $_FILES["foto"]["size"];


$upload_dir = 'fotos/'; // upload directory

 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

 // valid image extensions
 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

 // rename uploading image
 $userpic = rand(1000,1000000).".".$imgExt;
  
 // allow valid image file formats
 if(in_array($imgExt, $valid_extensions)){   
  // Check file size '1MB'
  if($imgSize < 1000000)    {
   move_uploaded_file($tmp_dir,$upload_dir.$userpic);
  }
  else{
//header("location: registrar.php?imagen");
exit(); 
  }
 }
 else{
  //("location: registrar.php?imagen"); 
  exit();
 }


    $sql="Insert Into tbl_pacientes values(NULL,'$nombre','$direccion','$telCasa','$telMovil','$fechaEx','$fechaNac','$estadoCivil','$ocupacion','$recomendado','$perResp',NULL,'$dirPerResp','$medPer','$telMed','$userpic','activo')";

    $result= $conexion->query($sql);
    if($result){
	//	header('Location: ../../selectCC.php?success=1');
    }else{
	//	header("Location: ../../nuevoPaciente.php?error=1");
    }
$conexion->close();



?>
