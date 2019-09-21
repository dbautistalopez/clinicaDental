<?php
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
<script type="text/javascript">
  function actualizar(id_usuario,nombre_usuario,username){
    //alert(id_categoria,nombre_categoria,descripcion_categoria);
     var id = id_usuario;
     var nombre = nombre_usuario;
     var username = username;

    $('#mid').val(id);
    $('#mnombre').val(nombre);
    $('#musuario').val(username);
    $('#edit').modal('show');
  }
</script>

<script>
  function activar(id_usuario,nombre_usuario){
     var id = id_usuario;
     var nombre = nombre_usuario;

    $('#m2id').val(id);
    document.getElementById('m2nombre').innerHTML = nombre;
    $('#activar').modal('show');
  }
</script>

<script>
  function desactivar(id_usuario,nombre_usuario){
     var id = id_usuario;
     var nombre = nombre_usuario;

    $('#m3id').val(id);
    document.getElementById('m3nombre').innerHTML = nombre;
    $('#desactivar').modal('show');
  }
</script>

<script>
  function cpassword2(id_usuario,password){
     var id = id_usuario;
     var pass = password;

    $('#m4id').val(id);
    $('#mpassword').val(pass);
    $('#ccontraseña').modal('show');
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
            <label style="font-size:30px;">Listado de Usuarios</label>
                          <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMarca" style="float:right; height:50px;margin-right:20px;">
                <span class="fa fa-plus fa-2x"></span> Agregar Usuario
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h3 class="modal-title" id="exampleModalLabel">Agregar Usuario</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                          <form method="post" action="Controller/usuarios/procesar_usuario.php">
                            <div class="form-group col-md-10">
                                 <label for="usuario">Nombre</label>
                                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre..." required>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="usuario">Usuario</label>
                                    <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Ingrese nombre de usuario" required>
                            </div>
                            <div class="form-group col-md-7">
                                <label for="password">Contraseña</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese contraseña" required>
                            </div>
                            <div class="form-group col-md-7">
                                    <label for="password">Confirme contraseña</label>
                                        <input class="form-control" type="password" id="confirmacion" name="confirmacion" placeholder="Ingrese contraseña" required>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="usuario">Seleccione rol</label>
                                        <select name="rol" id="rol" class="form-control" required>
                                        <?php

                                            $sql="Select * From tbl_rol";
                                            $result=mysqli_query($conexion,$sql);
                                            while($row=mysqli_fetch_array($result)){
                                                echo "<option value='".$row['id_rol']."'>";
                                                echo $row['nombre_rol'];
                                                echo "</option>";
                                            }
                                        ?>
                                        </select>
                                        <br>
                            </div>
                              <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                <br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
              </div>
            </div>
                  </div>
                </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>

            <br>
              <div class="row" style="margin-left:25px;margin-right:25px;">
                <div class="col-md-12" >
                  <div id="modalEdit">
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
                if(isset($_GET["nocoin"])){
                    echo "<script type='text/javascript'>
                            alertify.error('¡Error! Las contraseñas no coinciden', 'danger', 5, function(){});
                          </script>";
                }
                if(isset($_GET["nocoin2"])){
                    echo "<script type='text/javascript'>
                            alertify.error('¡Error! Contraseña antigua incorrecta', 'danger', 5, function(){});
                          </script>";
                }
                ?>
              </div>
              <!-- Fin mostrar alerta-->
                    <!-- Edit Modal-->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">Editar usuario</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="Controller/usuarios/modificar_usuario2.php">
                                            <div class="form-group col-md-10">
                                                 <label for="usuario">Nombre</label>
                                                    <input class="form-control" type="text" id="mnombre" name="nombre" placeholder="Ingrese nombre..." required>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="usuario">Usuario</label>
                                                    <input class="form-control" type="text" id="musuario" name="usuario" placeholder="Ingrese nombre de usuario" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                    <label for="usuario">Seleccione rol</label>
                                                        <select name="rol" id="rol" class="form-control" required>
                                                        <?php

                                                            $sql="Select * From tbl_rol";
                                                            $result=mysqli_query($conexion,$sql);
                                                            while($row=mysqli_fetch_array($result)){
                                                                echo "<option value='".$row['id_rol']."'>";
                                                                echo $row['nombre_rol'];
                                                                echo "</option>";
                                                            }
                                                        ?>
                                                        </select>
                                            </div>
                                              <br><br><br><br><br><br><br><br><br><br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_usuario" id="mid">
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
                                    <h3 class="modal-title" id="myModalLabel">Activar usuario</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="Controller/usuarios/activar_usuario.php">
                                              <center><h1>¿Activar <label id="m2nombre"></label> ?</h1></center>
                                              <br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_usuario" id="m2id">
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
                                    <h3 class="modal-title" id="myModalLabel">Desactivar usuario</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="Controller/usuarios/desactivar_usuario.php">
                                              <center><h1>¿Desactivar <label id="m3nombre"></label> ?</h1></center>
                                              <br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_usuario" id="m3id">
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

                  <div id="modalCcontraseña">
                    <!-- Edit Modal-->
                    <div class="modal fade" id="ccontraseña" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title" id="myModalLabel">Cambiar contraseña</h3>
                                </div>
                                    <div class="modal-body">
                                      <div id="users-form ">
                                          <form method="post" action="Controller/usuarios/modificar_password2.php">
                                            <div class="form-group col-md-7">
                                                <label for="password">Contraseña</label>
                                                    <input class="form-control" type="text" id="mpassword" name="passvieja" required >
                                            </div>
                                            <div class="form-group col-md-7">
                                                <label for="password">Contraseña nueva</label>
                                                    <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese contraseña" >
                                            </div>
                                            <div class="form-group col-md-7">
                                                    <label for="password">Confirme contraseña nueva</label>
                                                        <input class="form-control" type="password" id="confirmacion" name="confirmacion" placeholder="Ingrese contraseña" >
                                            </div>
                                          <br><br><br><br><br><br><br><br><br><br><br>
                                    <div class="modal-footer">
                                      <input type="hidden" name="id_usuario" id="m4id">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-warning">Guardar</button>
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
                                    <th>Usuario</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $sql="SELECT tbl_usuario.id_usuario, tbl_usuario.nombre_usuario, tbl_usuario.username, tbl_usuario.password, tbl_rol.nombre_rol, tbl_usuario.estado_usuario FROM tbl_usuario, tbl_rol WHERE tbl_usuario.id_rol = tbl_rol.id_rol order by id_usuario desc";
                                    $result=mysqli_query($conexion,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                      $i++;
                                ?>
                              <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['nombre_usuario'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['nombre_rol'] ?></td>
                                    <td><?php 
                                      if ($row['estado_usuario'] == 'activo') {
                                        echo "Activo";
                                      }
                                      if ($row['estado_usuario'] == 'inactivo') {
                                        echo "Inactivo";
                                      }
                                     ?></td>
                                    <td>

                                    <?php 
                                      if ($row['estado_usuario'] == 'activo') { ?>
                                        <center><button type="button" class="btn btn-warning " onclick="actualizar('<?php echo $row['id_usuario'] ?>','<?php echo $row['nombre_usuario'] ?>','<?php echo $row['username'] ?>')"  title="Editar" ><span class="fa fa-pencil-square-o edit"></span></button>
                                        <button type="button" class="btn btn-danger" onclick="desactivar('<?php echo $row['id_usuario'] ?>','<?php echo $row['nombre_usuario'] ?>')"  title="Desactivar" ><span class="fa fa-times"></span></button>
                                        <button type="button" class="btn btn-secondary" onclick="cpassword2('<?php echo $row['id_usuario'] ?>','<?php echo $row['password'] ?>')"  title="Cambiar contraseña" ><span class="fa fa-unlock-alt cpass"></span></button></center>      

                                      <?php }if ($row['estado_usuario'] == 'inactivo') { ?>

                                        <center><button type="button" class="btn btn-warning " onclick="actualizar('<?php echo $row['id_usuario'] ?>','<?php echo $row['nombre_usuario'] ?>','<?php echo $row['username'] ?>')"  title="Editar" ><span class="fa fa-pencil-square-o edit"></span></button>
                                        <button type="button" class="btn btn-success" onclick="activar('<?php echo $row['id_usuario'] ?>','<?php echo $row['nombre_usuario'] ?>')"  title="Desactivar" ><span class="fa fa-check"></span></button>
                                        <button type="button" class="btn btn-secondary" onclick="cpassword2('<?php echo $row['id_usuario'] ?>','<?php echo $row['password'] ?>')"  title="Cambiar contraseña" ><span class="fa fa-unlock-alt cpass"></span></button></center>
                                        
                                     <?php } 
                                   }
                                      ?>
                                    </td>
                              </tr>
                                <?php 
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
