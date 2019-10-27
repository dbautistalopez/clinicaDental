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
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/personal.css">
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
<!--Script para cargar datos en modal-->
<!-- <script>
  $(document).ready(function(){
    $("#btn-tratamiento").click(function(){
      $("#select").css("display","none");
      $("#tbl-tratamiento").css("display","block");
    });
  });
</script> -->

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
            <label style="font-size:30px;">Tratamientos por Paciente</label>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

                    <!--Contenido-->
                  <!-- <div id="select" class="row">
                    <div class="form-group col-md-6">
                      <br>
                                    <label for="usuario">Seleccione Paciente</label>
                                        <select name="categoria" id="categoria" class="form-control" required>
                                        <?php

                                            $sql="Select * From tbl_pacientes";
                                            $result=mysqli_query($conexion,$sql);
                                            while($row=mysqli_fetch_array($result)){
                                                echo "<option value='".$row['id_Pacientes']."'>";
                                                echo $row['nombre_Pacientes'];
                                                echo "</option>";
                                            }
                                        ?>
                                        </select>
                                        <br>
                    </div>
                    <div class="form-group col-md-4">
                      <br><br>
                      <button class="btn btn-primary" id="btn-tratamiento" style="font-weight:bold;display:inline-block">Ver Historial</button>
                    </div>
                  </div> -->

                  <?php
                      // $paciente = $_POST["id_Pacientes"];
                      // //Aqui tendriamos que recibir el Id del Paciente seleccionado para que solo se desplieguen los tratamientos pendientes de él
                      // $sql="SELECT * FROM tbl_pacientes WHERE id_Pacientes = $paciente";
                      // $result=mysqli_query($conexion,$sql);
                      // while($row=mysqli_fetch_array($result)){
                      
                      //   echo "<h2 style='font-weight:bold;color:#33b5e5'>".$row['nombre_Pacientes']."</h2>";
                      
                      // }

                  ?>
                  <br>
                  <div id="tbl-tratamiento">            
                    <table class="table-bordered table-hover table-striped" id="mytable">
  
                          <thead style="background: #263238; color:#FFFFFF;">
                              <tr>
                                  <th>Fecha</th>
                                  <th>Paciente</th>
                                  <th>No. Pieza</th>
                                  <th>T. Recomendado</th>
                                  <th>T. a Realizar</th>
                                  <th>Cargos</th>
                                  <th>Abono</th>
                                  <th>Saldo</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $i = 0;
                          // $sql="SELECT tbl_pacientes.id_Pacientes, tbl_pacientes.nombre_Pacientes, tbl_citas.fechaProgramada, tbl_citas.id_Pacientes, tbl_piezas.nombrePieza, tbl_presupuestos.descripcion, tbl_presupuestos.id_Pacientes, tratamientoRealizar.tratamientoRealizar, tratamientoRealizar.precio, tbl_cobranza.abonos,tbl_piezas.id_Piezas,tbl_presupuestos.id_Piezas, tbl_cobranza.tratamiento, tratamientorealizar.id_Seguimientos, tratamientorealizar.id_Presupuesto, tbl_presupuestos.id_Presupuesto FROM tbl_citas, tbl_piezas, tbl_presupuestos, tratamientorealizar, tbl_cobranza, tbl_pacientes WHERE  tbl_pacientes.id_Pacientes=tbl_citas.id_Pacientes AND tbl_pacientes.id_Pacientes=tbl_presupuestos.id_Pacientes AND tbl_citas.id_Pacientes = tbl_presupuestos.id_Pacientes AND tbl_piezas.id_Piezas = tbl_presupuestos.id_Piezas AND tbl_cobranza.tratamiento = tratamientorealizar.id_Seguimientos AND tratamientorealizar.id_Presupuesto = tbl_presupuestos.id_Presupuesto AND tbl_presupuestos.id_Pacientes = '$paciente' order by tbl_citas.fechaProgramada desc";
                          $sql="SELECT tbl_pacientes.id_Pacientes, tbl_pacientes.nombre_Pacientes, tbl_citas.fechaProgramada, tbl_citas.id_Pacientes, tbl_piezas.nombrePieza, tbl_presupuestos.descripcion, tbl_presupuestos.id_Pacientes, tratamientoRealizar.tratamientoRealizar, tratamientoRealizar.precio, tbl_cobranza.abonos,tbl_piezas.id_Piezas,tbl_presupuestos.id_Piezas, tbl_cobranza.tratamiento, tratamientorealizar.id_Seguimientos, tratamientorealizar.id_Presupuesto, tbl_presupuestos.id_Presupuesto FROM tbl_citas, tbl_piezas, tbl_presupuestos, tratamientorealizar, tbl_cobranza, tbl_pacientes WHERE  tbl_pacientes.id_Pacientes=tbl_citas.id_Pacientes AND tbl_pacientes.id_Pacientes=tbl_presupuestos.id_Pacientes AND tbl_citas.id_Pacientes = tbl_presupuestos.id_Pacientes AND tbl_piezas.id_Piezas = tbl_presupuestos.id_Piezas AND tbl_cobranza.tratamiento = tratamientorealizar.id_Seguimientos AND tratamientorealizar.id_Presupuesto = tbl_presupuestos.id_Presupuesto order by tbl_citas.fechaProgramada desc";
                          // $sql="SELECT *From tbl_pacientes order by id_Pacientes desc";
                          $result=mysqli_query($conexion,$sql);
                          while($row=mysqli_fetch_array($result)){
                                        ?>
                                    <tr>
                        <td><?php echo $row['fechaProgramada'] ?></td>
                        <td><?php echo $row['nombre_Pacientes'] ?></td>
                        <td><?php echo $row['nombrePieza'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['tratamientoRealizar'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td><?php echo $row['abonos'] ?></td>
                        <td class="text-center"><?php 
                          $saldo =  $row['precio'] - $row['abonos'];
  
                        if ($saldo < $row['precio']) {
                        ?>
                          <span style="font-weight:bold;color:blue;"><?php echo $saldo ?> </span>
                        <?php
                        }
                        if ($saldo == $row['precio']) {
                        ?>
                          <span style="font-weight:bold;color:blue;"><?php echo $saldo ?> </span>
                        <?php
                        }
                        ?></td>
                                    </tr>
                        <?php 
                          }
                                            $conexion->close();
                                        ?>
  
                      </tbody>
                      </table>
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
