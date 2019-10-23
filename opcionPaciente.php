<?php
// session_start();
//   if ($_SESSION["rol"] != 1) {
//     header("Location: ./");
//   }

//   require_once("lib/db.php");
//   require_once("prod.php");
//   $db =  new DbConnection;
//   $conexion=$db->conectar();
//   if(!isset($_SESSION["usuario"])){
//         header("Location: login.php");
//         exit();
//     }
?>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.min.js"></script>
  <script src="js/buscador.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php require_once 'plantilla.php';
 ?>

 <!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top:50px;">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <label style="font-size:30px;">Seleccione la opción...</label>


          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>

            <br>
              <div class="row" style="margin-left:25px;margin-right:25px;height:440px;">
                <div class="col-md-12" >
                    <!--Contenido-->
                        <div style='width: 300px;float:left; margin-left:300px; margin-top: 100px;' class="d-inline-block col-md-6">
                            <a class='btn btn-primary' href="nuevoPresupuesto.php" style='width:200px; height:75px; font-weight:bold;'>
                                <br>Tratamiento Recomendado
                            </a>
                        </div>

                        <div style='width: 300px;float:left; margin-top: 100px;' class="d-inline-block col-md-6">
                            <a class='btn btn-warning' href="nuevoTratamientoaRealizar.php" style='width:200px; height:75px; font-weight:bold;'>
                                <br>Crear Tratamiento
                            </a>
                        </div>
                        </div>
                              </div>
                            </div>
                          </div>
                        </div>
                              </div>
                            </div>
                          </div>
                        <!-- Button trigger modal -->
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
<!--Fin-Contenido-->
</body>
</html>