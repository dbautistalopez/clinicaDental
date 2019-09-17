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
                          <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMarca" style="float:right; height:50px;margin-right:20px;">
                <span class="fa fa-plus fa-2x"></span> Agregar Marca
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h3 class="modal-title" id="exampleModalLabel">Agregar Marca</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="users-form ">
                          <form action="">
                              <div class="form-group col-md-8">
                                  <label for="usuario">Nombre de Marca</label>
                                      <input class="form-control" type="text" id="marca" name="marca" placeholder="Ingrese nombre de categoría" required>
                              </div>
                                <br><br><br>
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="enviamarca" data-dismiss="modal">Enviar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

                          <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMedida" style="float:right; height:50px;margin-right:20px;">
                <span class="fa fa-plus fa-2x"></span> Agregar Unidad de Medida
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modalMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h3 class="modal-title" id="exampleModalLabel">Agregar Unidad de Medida</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="users-form ">
                          <form action="">
                              <div class="form-group col-md-8">
                                  <label for="usuario">Nombre de Unidad de Medida</label>
                                      <input class="form-control" type="text" id="medida" name="medida" placeholder="Ingrese nombre de categoría" required>
                              </div>
                                <br>

                                <br><br>
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" id="enviamedida" class="btn btn-primary" data-dismiss="modal">Enviar</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>

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
                                    <label for="usuario">Código de Producto</label>
                                        <input class="form-control" type="text" id="codigo" name="codigo" placeholder="Ingrese código del producto" required>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="usuario">Nombre del Producto</label>
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre del producto" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="usuario">Seleccione Categoría</label>
                                        <select name="categoria" id="categoria" class="form-control" required>
                                        <?php

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
                                <div class="form-group col-md-3">
                                    <label for="usuario">Seleccione Marca</label>
                                        <select name="marca" id="marca" class="form-control" required>
                                        <?php

                                            $sql="Select * From tbl_marca";
                                            $result=mysqli_query($conexion,$sql);
                                            while($row=mysqli_fetch_array($result)){
                                                echo "<option value='".$row['id_marca']."'>";
                                                echo $row['nombre_marca'];
                                                echo "</option>";
                                            }
                                        ?>
                                        </select>
                                        <br>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="usuario">Descripción del Producto</label>
                                        <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Ingrese descripción del producto" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="usuario">Existencia</label>
                                        <input class="form-control" type="number" min="1" id="existencia" name="existencia" placeholder="Cantidad en existencia" required>
<br>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="usuario">Existencia Mínima</label>
                                        <input class="form-control" type="number" min="1" id="minima" name="minima" placeholder="Cantidad mínima" required>
                                </div>
                                  <div class="form-group col-md-3">
                                      <label for="usuario">Precio normal</label>
                                      <div class="input-group">
                                          <span class="input-group-addon" style="background:#e0e0e0; opacity:0.7;">Q</span>
                                              <input class="form-control" type="number" min="0" step="any" id="normal" name="normal" placeholder="Ingrese precio" required>
                                      </div>
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label for="usuario">Precio rebaja</label>
                                      <div class="input-group ">
                                          <span class="input-group-addon"style="background:#e0e0e0; opacity:0.7;">Q</span>
                                              <input class="form-control" type="number" min="0" step="any" id="rebaja" name="rebaja" placeholder="Ingrese precio" required>
                                      </div>
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label for="usuario">Precio reventa</label>
                                      <div class="input-group ">
                                          <span class="input-group-addon"style="background:#e0e0e0; opacity:0.7;">Q</span>
                                              <input class="form-control" type="number" min="0" step="any" id="reventa" name="reventa" placeholder="Ingrese precio" required>
                                      </div>
                                      <br>
                                  </div>
                                  <div class="form-group col-md-3">
                                      <label for="usuario">Seleccione Unidad de Medida</label>
                                          <select name="medida" id="medida" class="form-control" required>
                                          <?php

                                              $sql="Select * From tbl_medida";
                                              $result=mysqli_query($conexion,$sql);
                                              while($row=mysqli_fetch_array($result)){
                                                  echo "<option value='".$row['id_medida']."'>";
                                                  echo $row['nombre_medida'];
                                                  echo "</option>";
                                              }
                                          ?>
                                          </select>
                                  </div>
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="width: 20%;">Registrar</button>
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
