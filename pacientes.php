<?php
session_start();

  // if ($_SESSION["rol"] != 1) {
  //   header("Location: ./");
  // }

  // require_once("lib/db.php");
  // require_once("prod.php");
  // $db =  new DbConnection;
  // $conexion=$db->conectar();
  // if(!isset($_SESSION["usuario"])){
  //       header("Location: login.php");
  //       exit();
  //   }
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
  
  <!-- <script>
  $(document).ready(function(){
    $('#enviamarca').click(function(){
      var marca = document.getElementById('marca').value;
      var ruta = "Nom="+marca;
      $.ajax({
        url: 'procces/procesar_marca.php',
        type: 'POST',
        data: ruta,
      })
      .done(function(res){
        $('#respuesta').html(res)
      })
      .fail(function(){
        console.log("error");
      })
      .always(function(){
        console.log("complete");
      });
    });
});
</script>
<script>
$(document).ready(function(){
  $('#enviamedida').click(function(){
    var medida = document.getElementById('medida').value;
    var ruta = "Nom="+medida;
    $.ajax({
      url: 'procces/procesar_medida.php',
      type: 'POST',
      data: ruta,
    })
    .done(function(res){
      $('#respuesta').html(res)
    })
    .fail(function(){
      console.log("error");
    })
    .always(function(){
      console.log("complete");
    });
  });
});
</script> -->
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
            <label style="font-size:30px;">Registro de Pacientes</label>
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
                        <div id="users-form"  style="margin-top:20px; padding:25px; background-color:#FFFFFF; border-radius:5px;margin-left:auto; margin-right:auto;">
                            <form method="post" action="procces/producto/procesar_producto.php">
                                <div class="form-group col-md-3">
                                    <label for="usuario">Todos lo Pacientes</label>
                                        <select name="categoria" id="categoria" class="form-control" required>
                                        <?php
                                            // Conexion a DB para mostrar todos los clientes on boton para editar
                                            $sql="Select * From tbl_categoria";
                                            $result=mysqli_query($conexion,$sql);
                                            while($row=mysqli_fetch_array($result)){
                                                echo "<option value='".$row['id_categoria']."'>";
                                                echo $row['nombre_categoria'];
                                                echo "</option>";
                                            }
                                        ?>
                                        </select>
                                        <br>
                                </div>
                                
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="width: 20%;">Registrar Nuevo Paciente</button>
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
