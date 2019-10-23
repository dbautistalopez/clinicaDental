<?php
//Agregar nueva pieza  recordar que en la base de datos se le llamo presupuestos

require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();

$paciente=$_POST["id_paciente"];
$ccl=(array)$_POST["ccl"];
$apunte=$_POST["apuntecc"];


    foreach( $ccl as $cclinico){
        $sql="Insert Into tbl_ccxpaciente values(NULL,'$cclinico','$paciente','$apunte')";
        $result= $conexion->query($sql);
    }
    if($result){
		header('Location: ../../opcionPaciente.php');
    }else{
		header("Location: ../../selectCC.php?error=1");
    }


//aqui faltaria poner lo del Id del paciente que dependeria de la sesion
//     $sql="Insert Into tbl_cclinico values(NULL,'$nombrecc','$descc')";


$conexion->close();



?>