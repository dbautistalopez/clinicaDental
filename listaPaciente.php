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
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <script src="js/jquery-3.4.1.min.js"></script>

      <!-- Alertify CSS -->
  <link rel="stylesheet" href="css/alertify.min.css">  
  <!-- Alertify theme default -->  
  <link rel="stylesheet" href="css/themes/default.min.css"/> 
  <script src="js/alertify.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/app.min.js"></script>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<!--Script para cargar datos en modal-->
<script type="text/javascript">
  function actualizar(id_paciente,nombre_paciente,direccion_paciente,telmovil_paciente){
    //alert(id_categoria,nombre_categoria,descripcion_categoria);
     var id = id_paciente;
     var nombre = nombre_paciente;
     var direccion = direccion_paciente;
     var tel = telmovil_paciente;

    $('#mid').val(id);
    $('#mnombre').val(nombre);
    $('#mdescripcion').val(direccion);
    $('#mminima').val(tel);
    $('#edit').modal('show');
  }
</script>

<script>
  function desactivar(id_paciente,nombre_paciente){
     var id = id_paciente;
     var nombre = nombre_paciente;

    $('#m2id').val(id);
    document.getElementById('m2nombre').innerHTML = nombre;
    $('#eliminar').modal('show');
  }
</script>
<script>
  function activar(id_paciente,nombre_paciente){
     var id = id_paciente;
     var nombre = nombre_paciente;

    $('#m3id').val(id);
    document.getElementById('m3nombre').innerHTML = nombre;
    $('#activar').modal('show');
  }
</script>

<script>
    $(document).ready( function () {
    $("#mytable").dataTable( {
        "language": {
            "url": "DataTables/DataTables-1.10.18/js/Spanish.json"
        }
    } );
  } );
</script>
</head>

<body class="hold-transition skin-blue sidebar-mini" style="background: #000000; overflow-x: auto; position: absolute;">
<?php require_once 'plantilla.php';
 ?>



 <!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper " style="margin-top:50px;width:81.9vw;height:100vh">

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <label style="font-size:30px;">Listado de Pacientes</label>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>

            <br>
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
                  <div id="modalEdit">
                    <!-- Edit Modal-->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">Editar Paciente</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="">
                                          <div class="form-group col-md-8">
                                              <label for="usuario">Nombre de Paciente</label>
                                                  <input class="form-control" type="text" id="mnombre" name="nombre" placeholder="Ingrese nombre del paciente" required>
                                          </div>
                                          <div class="form-group col-md-8">
                                              <label for="usuario">Dirección</label>
                                                  <input class="form-control" type="text" id="mdescripcion" name="descripcion" placeholder="Ingrese direccion" required>
                                          </div>
                                          <div class="form-group col-md-5">
                                              <label for="usuario">Teléfono móvil</label>
                                                  <input class="form-control" type="number" id="mminima" name="minima" placeholder="Ingrese telefono" min="8">
                                          </div>
                                              <br><br><br><br><br><br><br><br><br><br>
                                                <br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_paciente" id="mid">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-warning">Actualizar</button>
                                    </div>
                                  </form>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
<!-- /.modal -->
                  </div>

                  <div id="modalActivar">
                    <!-- Edit Modal-->
                    <div class="modal fade" id="activar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">Activar paciente</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="procces/paciente/activar_paciente.php">
                                              <center><h1>¿Activar <label id="m3nombre"></label> ?</h1></center>
                                              <br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_paciente" id="m3id">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-success">Activar</button>
                                    </div>
                                  </form>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
<!-- /.modal -->
                  </div>

                  <div id="modalDesactivar">
                    <!-- Edit Modal-->
                    <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">Desactivar paciente</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="procces/paciente/desactivar_paciente.php">
                                              <center><h1>¿Desactivar <label id="m2nombre"></label> ?</h1></center>
                                              <br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_paciente" id="m2id">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Desactivar</button>
                                    </div>
                                  </form>
                              </div>
                            </div>
                            </div>
                        </div>
                    </div>
<!-- /.modal -->
                  </div>
                        <!--Contenido-->
                        <table class="display table-bordered table-hover table-striped" id="mytable">

                            <thead style="background: #263238; color:#FFFFFF;">
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Fecha Examen</th>
                                    <th>Edad</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $sql="SELECT nombre_paciente,direccion_paciente,telmovil_paciente,fecha_examen,edad_paciente,estado_paciente From tbl_paciente order by id_paciente desc";
                                    $result=mysqli_query($conexion,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                      $i++;
                                ?>
                              <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['nombre_paciente'] ?></td>
                                    <td><?php echo $row['direccion_paciente'] ?></td>
                                    <td><?php echo $row['telmovil_paciente'] ?></td>
                                    <td class="text-center"><?php echo $row['fecha_examen'] ?></td>
                                    <td class="text-center"><?php echo $row['edad_paciente'] ?></td>
                                    <td class="text-center"><?php 
                                      if ($row['estado_paciente'] == 'activo') {
                                        echo "Activo";
                                      }
                                      if ($row['estado_paciente'] == 'inactivo') {
                                        echo "Inactivo";
                                      }
                                     ?></td>
                                    <td>
										<!-- <button type="button" class="btn btn-warning" onclick="actualizar('<?php echo $row['id_paciente'] ?>','<?php echo $row['nombre_paciente'] ?>','<?php echo $row['direccion_paciente']?>','<?php echo $row['telmovil_paciente'] ?>')"  title="Editar" >
										<i class="fa fa-pencil-square-o edit"></i>
									</button> -->

									<button type="button" class="btn btn-warning" onclick="actualizar('<?php 1 ?>','<?php 1 ?>','<?php 1 ?>','<?php 1 ?>')"><i class="fa fa-pencil-square-o edit"></i></button>

                                    <?php if ($row['estado_paciente'] == 'activo') { ?>
                                      <button type="button" class="btn btn-danger" onclick="desactivar('<?php echo $row['id_paciente']; ?>')"  title="Desactivar" ><i class="fa fa-times"></i></button>
                                      <?php }if ($row['estado_paciente'] == 'inactivo') { ?>
                                      <button type="button" class="btn btn-success" onclick="activar('<?php echo $row['id_paciente'] ?>','<?php echo $row['nombre_paciente'] ?>')"  title="Activar" ><i class="fa fa-check"></i></button>
                                      <?php }  ?></td></tr>
                                <?php
                                    }
                                    $conexion->close();
                                ?>

                          </tbody>
                          </table>
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
<!--Fin-Contenido-->  <!-- jQuery 2.1.4 -->
</body>
</html>