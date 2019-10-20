<?php
//Verificaci[on de Sesion
session_start();

  if ($_SESSION["rol"] != 1) {
    header("Location: ./");
  }

  require_once("lib/db.php");
  $db =  new DbConnection;
  $conexion=$db->conectar();
  if(!isset($_SESSION["usuario"])){
        header("Location: login.php");
        exit();
    }


    $sql= "SELECT tratamientoRealizar.tratamientoRealizar, tbl_presupuestos.descripcion, tbl_piezas.nombrePieza, tbl_citas.fechaProgramada, tbl_pacientes.nombre_Pacientes, tratamientoRealizar.precio, tbl_cobranza.abonos, tbl_cobranza.fecha FROM tratamientoRealizar INNER JOIN tbl_presupuestos ON tbl_presupuestos.id_Presupuesto = tratamientoRealizar.id_Presupuesto INNER JOIN tbl_piezas ON tbl_piezas.id_Piezas = tbl_presupuestos.id_Piezas INNER JOIN tbl_citas ON tbl_citas.id_Citas = tratamientoRealizar.id_Citas INNER JOIN tbl_pacientes ON tbl_pacientes.id_Pacientes = tbl_presupuestos.id_Pacientes INNER JOIN tbl_cobranza ON tbl_cobranza.tratamiento = tratamientoRealizar.id_Seguimientos";
    $result= $conexion->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Web | TCD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="img/icono.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="DataTables/DataTables-1.10.18/dataTables.bootstrap.min.js">
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.min.js"></script>
      <!-- Alertify CSS -->
  <link rel="stylesheet" href="css/alertify.min.css">  
  <!-- Alertify theme default -->  
  <link rel="stylesheet" href="css/themes/default.min.css"/> 
  <script src="js/alertify.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<!--Script para cargar datos en modal-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
 

                <section id="bienvenvidos">

                    <div class = "container">

                        <div class="row">
   
                             <div class = "col-md-7">
     
                              <table class = "table table-striped">
                                <thead>
                                    <tr>
                                    <th> Fecha</th>
                                    <th> Numero Pieza </th>
                                    <th> Tratamientos Recomendado</th>
                                    <th> Tratamientos a realizar</th>
                                    <th> Cargos </th>
                                    <th> Abonos </th>
                                    <th> Saldo </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 

                                        while($mostrar=mysqli_fetch_array($result)){

                                        ?>

                                        <tr>
                                            <?php //$saldo = $saldo + $mostrar['precio'] ?>
                                            <td><?php echo $mostrar['fechaProgramada'] ?></td>
                                            <td><?php echo $mostrar['nombrePieza'] ?></td>
                                            <td><?php echo $mostrar['descripcion'] ?></td>
                                            <td><?php echo $mostrar['tratamientoRealizar'] ?></td>
                                            <td><?php echo $mostrar['precio'] ?></td>
                                            <td><?php echo $mostrar['abonos'] ?></td>
                                            <td><?php //echo $saldo ?></td>
                                        
                                           
                                        </tr>
                                             <?php 
                                            }
                                            ?>
                                </tbody>
                               </table>
                                           


</section>
            
            
  

</body>
</html>
