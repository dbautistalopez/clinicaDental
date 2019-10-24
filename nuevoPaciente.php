<?php
// session_start();

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
<!-- Verificacion de Sesion -->
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
                            <form method="post" action="Controller/pacientes/procesar_paciente.php" enctype="multipart/form-data" >
                                <div class="form-group col-md-6">
                                     <label for="foto">Foto del Paciente</label>
                                     <input class="form-control" type="file" id= "foto" name="foto" accept="image/*" placeholder="Foto" required="" />
                               
                                 </div>       
                                <div class="form-group col-md-12">
                                     <label for="usuario">Nombre del Paciente</label>
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre del paciente" required>
                                </div>
                                <div class="form-group col-md-8">
                                     <label for="direccion">Dirección</label>
                                        <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                                </div>
                                <div class="form-group col-md-4">
                                     <label for="dpi">DPI</label>
                                        <input class="form-control" type="text" id="dpi" name="dpi" placeholder="Ingrese su DPI" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="tel1">Teléfono de Casa</label>
                                    <input class="form-control" type="tel" placeholder="77112233" id="tel1" name="telcasa">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="tel2">Teléfono Celular</label>
                                    <input class="form-control" type="tel" placeholder="55443322" id="tel2" name="telmovil">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="fecha" class="col-2 col-form-label">Fecha Examen</label>
                                    <input class="form-control" type="date" value="2019-01-10" id="fecha" name="fechaexamen">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="fechaNac" class="col-2 col-form-label">Fecha de Nacimiento</label>
                                    <input class="form-control" type="date" value="1999-02-20" id="fechaNac" name="fechaNac">
                                </div>
                                <div class="form-group col-md-4">
                                     <label for="estadoCivil">Estado Civil</label>
                                        <input class="form-control" type="text" id="estadoCivil" name="estadoCivil" placeholder="Ingrese estado civil" required>
                                </div>
                                <div class="form-group col-md-4">
                                     <label for="ocupacion">Ocupación</label>
                                        <input class="form-control" type="text" id="ocupacion" name="ocupacion" placeholder="Ingrese ocupación" required>
                                </div>
                                <div class="form-group col-md-12">
                                     <label for="recomendado">Recomendado por:</label>
                                        <input class="form-control" type="text" id="recomendado" name="recomendado" placeholder="Nombre" required>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="perResp">Persona Responsable</label>
                                        <input class="form-control" type="text" id="perResp" name="perResp" placeholder="Persona Responsable" required>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="dirPerResp">Dirección persona responsable</label>
                                        <input class="form-control" type="text" id="dirPerResp" name="dirPerResp" placeholder="Dirección" required>
                                </div>
                                <div class="form-group col-md-6">
                                     <label for="medPer">Médico Personal</label>
                                        <input class="form-control" type="text" id="medPer" name="medPer" placeholder="Nombre del Médico" required>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="telMed">Teléfono del Médico</label>
                                    <input class="form-control" type="tel" placeholder="55443322" id="telMed" name="telMed">
                                </div>
                                <!--<div class="form-group col-md-3">
                                    <label for="usuario">Seleccione Estado o tratamiento</label>
                                        <select name="categoria" id="categoria" class="form-control" required>
                                        <?php
                                            //Conexion a la base de datos con mysqli
                                            $sql="Select * From tbl_categoria";
                                            $result=mysqli_query($conexion,$sql);
                                            while($row=mysqli_fetch_array($result)){
                                                // Imprime informacion desde la base de datos
                                                echo "<option value='".$row['id_categoria']."'>";
                                                echo $row['nombre_categoria'];
                                                echo "</option>";
                                            }
                                        ?>
                                        </select>
                                        <br>
                                </div>-->
                                
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
