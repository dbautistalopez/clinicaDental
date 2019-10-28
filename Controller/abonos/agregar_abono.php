<?php
//Registrar abonos

require_once("../../lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();



$paciente=$_POST["id_Pacientes"];
$tratamiento=$_POST["tratamiento"];
$fecha=$_POST["fecha"];
$cantidad=$_POST["cantidad"];


echo $paciente;
echo $tratamiento;
echo $fecha;
echo $cantidad;

    $sql="Insert Into tbl_cobranza values(NULL, '$tratamiento' , '$paciente' , '$cantidad' , '$fecha')";

    $result= $conexion->query($sql);
    if($result){
       // echo "Producto creado satisfactoriamente <br>";
		header('Location: ../../vertratamientos.php');
       // echo "<a href=\"../productos.php\">Regresar</a>";
    }else{

        //Tenemos que enviar a una pagina donde salga error, porque como manejamos con Post el Id entre archivos
		header("Location: ../../vertratamientos.php?error=1");
    }
$conexion->close();



?>