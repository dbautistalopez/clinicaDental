<!-- Verificacion de Sesion -->
<?php
 session_start();
if ($_SESSION["estado"] == "inactivo") {
  session_destroy();
  header("Location: login.php");
}
  require_once("lib/db.php");
  $db =  new DbConnection;
  $conexion=$db->conectar();
    
  if(!isset($_SESSION["usuario"])){
      header("Location: login.php");
      exit();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Web | FERRETERÍA</title>
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
   <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
  <script src="js/buscador.js"></script>
<!-- Latest compiled and minified JavaScript -->
<!-- Optional theme -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php require_once 'plantilla.php';
 ?>

<div class="content-wrapper" style="margin-top:50px;">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <label style="font-size:30px;">Detalle de Venta</label>
                          <!-- Button trigger modal -->
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div style="float: right;">
                    <!--<a href="rventas.php" class="btn btn-secondary fa fa-arrow-left" style="width: 200px; background: #e0e0e0"><strong>       Regresar</strong></a>-->
                    
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="listaPaciente.php">Listado de Pacientes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalle</li>
                      </ol>
                    </nav>
                  </div>
                        <!--Contenido-->
                        <?php 

$id_Paciente=$_POST["id_Pacientes"];


// $sql = "Select tbl_pacientes.nombre_Pacientes, tbl_cclinico.nombre_cc from tbl_pacientes, tbl_cclinico where tbl_pacientes.id_Pacientes = '$id_Paciente'";
$sql = "SELECT tbl_pacientes.id_Pacientes, tbl_pacientes.nombre_Pacientes, tbl_cclinico.nombre_cc, tbl_cclinico.id_cclinico, tbl_ccxpaciente.apunte FROM tbl_pacientes, tbl_cclinico, tbl_ccxpaciente WHERE tbl_pacientes.id_Pacientes = tbl_ccxpaciente.id_Pacientes AND tbl_ccxpaciente.id_cclinico = tbl_cclinico.id_cclinico AND tbl_pacientes.id_Pacientes = '$id_Paciente'";
  $result= $conexion->query($sql);
  if($result){
      $i=0;
                    echo "<table class='table table-responsive table-bordered table-dark table-striped table-hover' margin-left:auto; margin-right:auto; margin-top:25px;' >";
                                  echo "<thead>";
                                    echo "<tr>";
                                      echo "<th>No.</th>";
                                      echo "<th>Cuadro Clínico</th>";
                                      echo "<th>Apunte</th>";
                                    echo "</tr>";
                                  echo "</thead >";
                                 echo "<tbody>";

                      while($row=mysqli_fetch_array($result)){  
                                    echo "<tr>";
                                      echo "<td>".$i++."</td>";
                                      echo "<td>".$row['nombre_cc']."</td>";
                                      echo "<td>".$row['apunte']."</td>";
                                    echo "</tr>";
                                  }
                                  echo "</tbody>";
                                echo "</table>";


}

$conexion->close();


?>
                        <!--Fin Contenido-->
                  </div>
                </div>

                <!--<div id="tabladatos"> </div>-->

            </div>
          </div><!-- /.row -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->

  </section><!-- /.content -->
</body>
</html>
