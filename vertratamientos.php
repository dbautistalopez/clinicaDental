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
    $("#tabla2").dataTable( {
        "language": {
            "url": "DataTables/DataTables-1.10.18/js/Spanish.json"
        }
    } );
    $("#tabla3").dataTable( {
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
                                  
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $i = 0;
                          // $sql="SELECT tbl_pacientes.id_Pacientes, tbl_pacientes.nombre_Pacientes, tbl_citas.fechaProgramada, tbl_citas.id_Pacientes, tbl_piezas.nombrePieza, tbl_presupuestos.descripcion, tbl_presupuestos.id_Pacientes, tratamientoRealizar.tratamientoRealizar, tratamientoRealizar.precio, tbl_cobranza.abonos,tbl_piezas.id_Piezas,tbl_presupuestos.id_Piezas, tbl_cobranza.tratamiento, tratamientorealizar.id_Seguimientos, tratamientorealizar.id_Presupuesto, tbl_presupuestos.id_Presupuesto FROM tbl_citas, tbl_piezas, tbl_presupuestos, tratamientorealizar, tbl_cobranza, tbl_pacientes WHERE  tbl_pacientes.id_Pacientes=tbl_citas.id_Pacientes AND tbl_pacientes.id_Pacientes=tbl_presupuestos.id_Pacientes AND tbl_citas.id_Pacientes = tbl_presupuestos.id_Pacientes AND tbl_piezas.id_Piezas = tbl_presupuestos.id_Piezas AND tbl_cobranza.tratamiento = tratamientorealizar.id_Seguimientos AND tratamientorealizar.id_Presupuesto = tbl_presupuestos.id_Presupuesto AND tbl_presupuestos.id_Pacientes = '$paciente' order by tbl_citas.fechaProgramada desc";
                         // $sql="SELECT tbl_pacientes.id_Pacientes, tbl_pacientes.nombre_Pacientes, tbl_citas.fechaProgramada, tbl_citas.id_Pacientes, tbl_piezas.nombrePieza, tbl_presupuestos.descripcion, tbl_presupuestos.id_Pacientes, tratamientoRealizar.tratamientoRealizar, tratamientoRealizar.precio, tbl_cobranza.abonos,tbl_piezas.id_Piezas,tbl_presupuestos.id_Piezas, tbl_cobranza.tratamiento, tratamientorealizar.id_Seguimientos, tratamientorealizar.id_Presupuesto, tbl_presupuestos.id_Presupuesto FROM tbl_citas, tbl_piezas, tbl_presupuestos, tratamientorealizar, tbl_cobranza, tbl_pacientes WHERE  tbl_pacientes.id_Pacientes=tbl_citas.id_Pacientes AND tbl_pacientes.id_Pacientes=tbl_presupuestos.id_Pacientes AND tbl_citas.id_Pacientes = tbl_presupuestos.id_Pacientes AND tbl_piezas.id_Piezas = tbl_presupuestos.id_Piezas AND tbl_cobranza.tratamiento = tratamientorealizar.id_Seguimientos AND tratamientorealizar.id_Presupuesto = tbl_presupuestos.id_Presupuesto order by tbl_citas.fechaProgramada desc";
                          // $sql="SELECT *From tbl_pacientes order by id_Pacientes desc";
                          $paciente = $_POST["id_Pacientes"];
                         
                          $sumacargos = 0;


                          $sql1 = "SELECT tratamientorealizar.precio from tratamientorealizar INNER JOIN tbl_presupuestos ON tbl_presupuestos.id_Presupuesto = tratamientorealizar.id_Presupuesto WHERE tbl_presupuestos.id_Pacientes = '$paciente'";
                          $result1=mysqli_query($conexion,$sql1);
                          while($row=mysqli_fetch_array($result1)){

                          
                          $suma1= $row['precio'];
                          $sumacargos = $sumacargos + $suma1;
                          }

                        


                         $sql = "SELECT tbl_citas.fechaProgramada, tbl_pacientes.nombre_Pacientes, tbl_piezas.nombrePieza, tbl_presupuestos.descripcion, tratamientoRealizar.tratamientoRealizar, tratamientorealizar.precio FROM tratamientoRealizar INNER JOIN tbl_presupuestos ON tbl_presupuestos.id_Presupuesto = tratamientoRealizar.id_Presupuesto INNER join tbl_citas ON tbl_citas.id_Citas = tratamientoRealizar.id_Citas INNER JOIN tbl_pacientes on tbl_pacientes.id_Pacientes = tbl_presupuestos.id_Pacientes INNER JOIN tbl_piezas ON tbl_piezas.id_Piezas = tbl_presupuestos.id_Piezas WHERE tbl_pacientes.id_Pacientes = '$paciente'";
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
                                    </tr>
                        <?php 
                          }
                                         //   $conexion->close();
                                        ?>

                        <tr>
                          <td colspan="4"></td>
                          <td><label style="font-size:30px;">Total:</label></td>
                          <td><label style="font-size:30px;"><?php   echo $sumacargos; ?>  </label></td>
                        </tr>
  
                      </tbody>
                      </table>
                  </div>


                  <div id="tbl-tratamientos" style="margin-top:50px;margin-bottom:25px;">            
                    <table class="table-bordered table-hover table-striped" id="tabla2" style="width:100%">
  
                          <thead style="background: #263238; color:#FFFFFF;">
                              <tr>
                                  
                                  <th>Paciente</th>
                                  
                                  <th>T. Recomendado</th>
                                  <th>T. a Realizar</th>
                                  <th>Abonos</th>
                                  <th>Fecha del Abono</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $i = 0;
                         
                         
                          $sumaabonos = 0;

                          $sql2 = "SELECT tbl_pacientes.nombre_Pacientes, tratamientorealizar.tratamientoRealizar, tbl_presupuestos.descripcion, tbl_cobranza.abonos, tbl_cobranza.fecha from tbl_cobranza INNER JOIN tratamientorealizar on tratamientorealizar.id_Seguimientos = tbl_cobranza.tratamiento INNER JOIN tbl_presupuestos ON tbl_presupuestos.id_Presupuesto = tratamientorealizar.id_Presupuesto INNER JOIN tbl_pacientes ON tbl_pacientes.id_Pacientes = tbl_presupuestos.id_Pacientes WHERE tbl_cobranza.idpaciente = '$paciente' ";
                          $result2=mysqli_query($conexion,$sql2);
                          while($row=mysqli_fetch_array($result2)){

                            $suma= $row['abonos'];
                            $sumaabonos = $sumaabonos + $suma;
                                        ?>
                                    <tr>

                                    <td><?php echo $row['nombre_Pacientes'] ?></td>
                                   
                                    <td><?php echo $row['descripcion'] ?></td>
                                    <td><?php echo $row['tratamientoRealizar'] ?></td>
                                    <td><?php echo $row['abonos'] ?></td>
                                    <td><?php echo $row['fecha'] ?></td>
                                  
                       
                      
                        
                                    </tr>
                        <?php 
                          }
                          
                                            $conexion->close();

                                            $saldo = $sumacargos - $sumaabonos;
                                        ?>
                                          
                                    <tr>
                                      <td colspan="2"></td>
                                      <td><label style="font-size:30px;">Total:</label></td>
                                      <td><label style="font-size:30px;"><?php   echo $sumaabonos; ?>  </label></td>
                                      <td></td>
                                    </tr>
  
                      </tbody>
                      </table>

                   
                  </div>


                  <form action="nuevoabono.php" method="post" class="text-center">
                    <input type="hidden" name="id_Pacientes" id="id_Pacientes" value="<?php echo $paciente ?>" />
                    <button type="submit" class="btn btn-primary"  title="Nuevo Abono">Agregar Abono</button>
                  </form>

                  <div id="tbl-tratamiento" style="margin-top:50px;" class="text-center">            
                    <table class="table-bordered table-hover table-striped" id="tabla3">
  
                          <thead style="background: #263238; color:#FFFFFF;">
                              <tr>
                                  
                                  <th>Total Cargos</th>
                                  <th>Total Abonos</th>
                                  <th>Saldo</th>
                                 
                                  
                              </tr>
                          </thead>
                          <tbody>
                        
                                    <tr>
                                    <td><?php  echo $sumacargos ?></td>
                                    <td><?php  echo $sumaabonos ?></td>
                                    <td><?php 
                                    // if($saldo < $sumacargos){
                                    //   echo "<span style='color:red'>".$saldo."</span>";
                                    // }
                                    // if($saldo == 0){
                                    //   echo "<span style='color:green'>".$saldo."</span>";
                                    // }
                                    echo $saldo
                                    ?></td>
                                    </tr>
                
                          </tbody>
                          </table>
                  </div>

                 
                    <div class="box-header with-border">
                      <label style="font-size:30px;">Saldo         <?php   echo $saldo; ?>  </label>
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
