
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
<html lang="es">
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
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.min.js"></script>
  <script src="js/buscador.js"></script>
  <style type="text/css">
        h1{
            background-image: linear-gradient(90deg, transparent 5%, rgba(233, 30, 99, 0.7) 30%, rgba(233, 30, 99, 0.7) 70%, transparent 95%);
            text-align: center;
            padding: 0 10%;
            margin-top:2px;
            text-align:center;
            color:white;
        }
    </style>
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
          <!--Bienvenida al Sistema -->
            <label style="font-size:30px;">Inicio</label>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>

            <br>
              <div class="row" style="margin-left:25px;margin-right:25px;">
                <div class="col-md-12" >
                        <!--Contenido-->
                        <div style="width:100%; background-color:white;">
                        <h1 style="text-align:center; ">¡Bienvenido <?php 
                      $idu = $_SESSION["id"];
                      $sql="select nombre_usuario from tbl_usuario where id_usuario = '$idu'";
                      $result=mysqli_query($conexion,$sql);
                      while($row=mysqli_fetch_array($result)){

                      echo $row["nombre_usuario"];
                       } ?>!
                      </h1>
                        <hr>
                        </div>
                        <div style="width:100%; background-color:white;">
                            <center>
                                <img src="img/Sistema.png" class="img-fluid" width="70%" height="365px" margin="40px" style="border-radius:10px;">
                            </center>
                            <br>
                        </div>
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
