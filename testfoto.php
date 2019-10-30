
<?php
 session_start();
if ($_SESSION["estado"] == "inactivo") {
  session_destroy();
  header("Location: login.php");
}
require_once("lib/db.php");
$db =  new DbConnection;
$conexion=$db->conectar();
//
    
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
  <title>Sistema Web | TCD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="img/icono.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <link rel="stylesheet" href="css/personal.css">
  <script src="js/jQuery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/app.min.js"></script>
      <!-- Alertify CSS -->
  <link rel="stylesheet" href="css/alertify.min.css">  
  <!-- Alertify theme default -->  
  <link rel="stylesheet" href="css/themes/default.min.css"/> 
  <script src="js/alertify.js"></script>
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
			<label style="font-size:30px;" id="titulo">Registro de Pacientes</label>
			<label style="font-size:30px;" id="titulo1">Seleccione las opciones...</label>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                                  <!-- Mostrar alerta-->
                <div class="text-center text-danger">
                <?php
                if(isset($_GET["success"])){
                    echo "<script type='text/javascript'>
                            alertify.success('¡Correcto!', 5, function(){});
                          </script>";
                }
                if(isset($_GET["error"])){
                    echo "<script type='text/javascript'>
                            alertify.error('¡Error!', 'danger', 5, function(){});
                          </script>";
                }
                ?>
              </div>
              <!-- Fin mostrar alerta-->
                    <div id="respuesta"></div>
                        <!--Contenido-->
                        <!-- Form para crear nuevo Usuario con los datos Proporcionados por el cliente -->
                        <div id="users-form"  style="padding:25px; background-color:#FFFFFF; border-radius:5px;margin-left:auto; margin-right:auto;" >
                            <form method="post" action="Controller/pacientes/procesar_foto.php" enctype="multipart/form-data">
                                <div class="form-group col-md-6">
                                    <label for="imagen">Imagen:</label> 
                                    <input class="form-control" type="file" name="foto" accept="image/*" placeholder="Foto" required="" />
                                 </div>       
                              
                             
                                
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <br>
                                    <button type="submit" id="regNuevo" class="btn btn-primary" style="width: 20%;">Registrar Nuevo Paciente</button>
                                  </div>
                                </div>
                            </form>

						</div>
                        <!--Fin Contenido-->
                  </div>
                </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->

  </section><!-- /.content -->
<!--Fin-Contenido-->
</body>
</html>
