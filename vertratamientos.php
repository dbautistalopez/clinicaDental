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

                        <!--Contenido-->
                        <table class="display table-bordered table-hover table-striped" id="mytable">

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
