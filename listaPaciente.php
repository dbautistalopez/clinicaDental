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
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideDown("slow");
  });
});
</script>
<!--Script para cargar datos en modal-->
<script type="text/javascript">
  function actualizar(id_Paciente,nombre_Pacientes,direccion_Pacientes,telefonoCel){
    //alert(id_categoria,nombre_categoria,descripcion_categoria);
     var id = id_Paciente;
     var nombre = nombre_Pacientes;
     var direccion = direccion_Pacientes;
     var tel = telefonoCel;

    $('#mid').val(id);
    $('#mnombre').val(nombre);
    $('#mdescripcion').val(direccion);
    $('#mminima').val(tel);
    $('#edit').modal('show');
  }
</script>

<script>
  function desactivar(id_Paciente,nombre_Pacientes){
     var id = id_Paciente;
     var nombre = nombre_Pacientes;

    $('#m2id').val(id);
    document.getElementById('m2nombre').innerHTML = nombre;
    $('#desactivar').modal('show');
  }
</script>
<script>
  function activar(id_Paciente,nombre_Pacientes){
     var id = id_Paciente;
     var nombre = nombre_Pacientes;

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
            <label style="font-size:30px;">Listado de Pacientes</label>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>

            <br>
              <div class="row" style="margin-left:25px;margin-right:25px;">
                <div class="col-md-12" >
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
                                          <form method="post" action="Controller/pacientes/modificar_paciente.php">
                                          <div class="form-group col-md-8">
                                              <label for="usuario">Nombre de Paciente</label>
                                                  <input class="form-control" type="text" id="mnombre" name="nombre" placeholder="Ingrese nombre del paciente" required>
                                          </div>
                                          <div class="form-group col-md-8">
                                              <label for="usuario">Dirección</label>
                                                  <input class="form-control" type="text" id="mdescripcion" name="direccion" placeholder="Ingrese direccion" required>
                                          </div>
                                          <div class="form-group col-md-5">
                                              <label for="usuario">Teléfono móvil</label>
                                                  <input class="form-control" type="number" id="mminima" name="tel" placeholder="Ingrese telefono" min="8">
                                          </div>
                                              <br><br><br><br><br><br><br><br><br><br>
                                                <br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_Paciente" id="mid">
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

                  <div id="modalActivo">
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
                                          <form method="post" action="Controller/pacientes/activar_paciente.php">
                                              <center><h1>¿Activar <label id="m3nombre"></label> ?</h1></center>
                                              <br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_Paciente" id="m3id">
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

                  <div id="modalDesactivo">
                    <!-- Edit Modal-->
                    <div class="modal fade" id="desactivar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">Desactivar paciente</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="Controller/pacientes/desactivar_paciente.php">
                                              <center><h1>¿Desactivar <label id="m2nombre"></label> ?</h1></center>
                                              <br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_Paciente" id="m2id">
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
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Fecha Examen</th>
                                    <th>Historial Clínico</th>
                                    <th>CC</th>
                                    <th>Tratamiento</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $i = 0;
								  $sql="SELECT *From tbl_pacientes order by id_Pacientes desc";
								  $result=mysqli_query($conexion,$sql);
								  while($row=mysqli_fetch_array($result)){
									$i++;
                                ?>
                              <tr>
                <td><?php echo $i; ?></td>
                <td> <img src="Controller/pacientes/fotos/<?php echo $row['fotografias']; ?>" class="img-rounded" width="64px" height="64px" /> </td>
                <td class="font-weight-bold"><?php echo $row['nombre_Pacientes'] ?></td>
                <td><?php echo $row['direccion_Pacientes'] ?></td>
                <td><?php echo $row['telefonoCel'] ?></td>
                <td class="text-center"><?php echo $row['fechaRegistro'] ?></td>
                <td class="text-center">
                  <form action="vertratamientos.php" method="post">
                    <input type="hidden" name="id_Pacientes" id="id_Pacientes" value="<?php echo $row['id_Pacientes']; ?>" />
                    <button type="submit" class="btn btn-light fa fa-eye"  title="Ver tratamientos"></button>
                  </form>
                </td>
                <td class="text-center">                                    
                  <form action="detallecc.php" method="post">
                  <input type="hidden" name="id_Pacientes" id="id_Pacientes" value="<?php echo $row['id_Pacientes']; ?>" />
                  <button type="submit" class="btn fa fa-cc" id="btndetalle"  title="Ver detalle" style="background: #fdd835"></button>
                  </form>
                </td>
                <td>
                  <form action="nuevoPresupuesto.php" method="post" style="display:inline">
                    <input type="hidden" name="id_Pacientes" id="id_Pacientes" value="<?php echo $row['id_Pacientes']; ?>" />
                    <button type="submit" class="btn btn-success" id="btndetalle"  title="Tratamiento Recomendado" style="font-weight:bold;">TR</button>
                  </form>
                  <form action="nuevoTratamientoaRealizar.php" method="post" style="display:inline">
                    <input type="hidden" name="id_Pacientes" id="id_Pacientes" value="<?php echo $row['id_Pacientes']; ?>" />
                    <button type="submit" class="btn btn-primary" id="btndetalle"  title="Nuevo Tratamiento" style="font-weight:bold;">NT</button>
                  </form>
                </td>
                <td class="text-center"><?php 
                  if ($row['estadoPaciente'] == 'activo') {
                    echo "Activo";
                  }
                  if ($row['estadoPaciente'] == 'inactivo') {
                    echo "Inactivo";
                  }
                  ?>
                </td>
                <td>

                  <center>
										<button type="button" class="btn btn-warning " onclick="actualizar('<?php echo $row['id_Pacientes'] ?>','<?php echo $row['nombre_Pacientes'] ?>','<?php echo $row['direccion_Pacientes'] ?>','<?php echo $row['telefonoCel'] ?>')"  title="Editar" ><span class="fa fa-pencil-square-o edit"></span></button>

										<?php if ($row['estadoPaciente'] == 'activo') { ?>
										<button type="button" class="btn btn-danger" onclick="desactivar('<?php echo $row['id_Pacientes']; ?>','<?php echo $row['nombre_Pacientes']; ?>')"  title="Desactivar" ><i class="fa fa-times"></i></button>

										<?php }if ($row['estadoPaciente'] == 'inactivo') { ?>

										<button type="button" class="btn btn-success" onclick="activar('<?php echo $row['id_Pacientes'] ?>','<?php echo $row['nombre_Pacientes'] ?>')"  title="Activar" ><i class="fa fa-check"></i></button>

										<?php }  ?>
								  </center>      
                                        
                                    </td>
                              </tr>
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
<!--Fin-Contenido-->

</body>
</html>
