
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
  <title>Sistema Web | TCD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="img/icono.png" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!--<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="shortcut icon" href="img/favicon.ico">-->
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
            <label style="font-size:30px;">Tratamientos a realizar</label>
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
                        <!-- Form para crear nuevo Tratamiento con los datos Proporcionados por el cliente -->
                        <div id="users-form"  style="padding:0px 25px 25px 25px; background-color:#FFFFFF; border-radius:5px;margin-left:auto; margin-right:auto;">
                            <form method="post" action="Controller/tratamientos/agregar_tratamientos.php">

                                
                                    <?php
                                      $paciente = $_POST["id_Pacientes"];
                                      //Aqui tendriamos que recibir el Id del Paciente seleccionado para que solo se desplieguen los tratamientos pendientes de él
                                      $sql="SELECT * FROM tbl_pacientes WHERE id_Pacientes = $paciente";
                                      $result=mysqli_query($conexion,$sql);
                                      while($row=mysqli_fetch_array($result)){
                                      
                                        echo "<h2 style='font-weight:bold;color:#33b5e5'>".$row['nombre_Pacientes']."</h2>";
                                      
                                      }

                                        ?>
                               <br>
                                <div class="form-group col-md-4">
                                 <label for="tel1">Selecciona Tratamiento Recomendado</label>
                                     <select class="form-control" id="tratreco" name="tratreco" placeholder="Selecciona tratamiento recomendado" required>
                                     
                                    <?php
                                    //davidsin lo mirara 
                                      $sql="SELECT * FROM tbl_presupuestos WHERE id_Pacientes = $paciente";
                                      $result=mysqli_query($conexion,$sql);
                                        while($mostrar=mysqli_fetch_array($result)){
                                        echo "<option value= '".$mostrar['0']."'>".$mostrar['3']."</option>";  //De esta forma el numero 0 representa la posicion que realizo el select y muestra todos los productos
                                        }

                                        
                                    ?>

                                   </select>
                                </div>  
                                 
                                <div class="form-group col-md-4">
                                  <label for="tel2">Escribe Tratamiento </label>
                                    <input class="form-control" type="text" placeholder="Escriba Tratamiento recomendado" id="tratamiento" name="tratamiento">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="fecha" class="col-2 col-form-label">Precio en Quetzales</label>
                                    <input class="form-control" type="text" value="100" id="precio" name="precio">
                                </div>   
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="width: 20%;">Agregar Tratamiento</button>
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
