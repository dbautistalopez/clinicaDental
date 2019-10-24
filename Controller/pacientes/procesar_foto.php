<?php


require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();


$imgFile = $_FILES['foto']['name'];
$tmp_dir = $_FILES['foto']['tmp_name'];
$imgSize = $_FILES['foto']['size'];


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


 $sql = "UPDATE tbl_pacientes SET tbl_pacientes.fotografias = '$userpic' WHERE tbl_pacientes.id_Pacientes = 1";
 $result= $conexion->query($sql);

 $conexion->close();

?>