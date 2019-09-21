<?php
require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$nombre=$_POST["nombre"];
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$confirmacion=$_POST["confirmacion"];
$rol=$_POST["rol"];

//si los passwords coinciden
if($password==$confirmacion){

    
    $sql="Insert Into tbl_usuario values(NULL,'$nombre','$usuario',SHA2('$password',256),'$rol','activo')";
    
    $result= $conexion->query($sql);
    if($result){
        header('Location: ../../usuario.php?success=1');
    }else{
        header('Location: ../../usuario.php?error=1');
    }
}else{
	header('Location: ../../usuario.php?nocoin=1');
}
$conexion->close();

?>