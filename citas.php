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

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="text/html; IE=edge">
  <title>Sistema Web | TCD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- <link rel="icon" type="image/png" href="img/icono.png" /> -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <link rel="stylesheet" href="css/personal.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/jQuery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/app.min.js"></script>
      <!-- Alertify CSS -->
  <link rel="stylesheet" href="css/alertify.min.css">  
  <!-- Alertify theme default -->  
  <link rel="stylesheet" href="css/themes/default.min.css"/> 
  <script src="js/alertify.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
  <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css">
  <link rel="stylesheet" type="text/css" href="./calendar/dist/tui-calendar.css">
  <link rel="stylesheet" type="text/css" href="./calendar/examples/css/default.css">
  <link rel="stylesheet" type="text/css" href="./calendar/examples/css/icons.css">
</head>
<body>

    <body class="hold-transition skin-blue sidebar-mini">
    <?php require_once 'plantilla.php';
    ?>


    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-top:50px;">

         <!-- Main content -->
   <section class="content">

    <div id="lnb">
        <div class="lnb-new-schedule">
            <button id="btn-new-schedule" type="button" class="btn btn-default btn-block lnb-new-schedule-btn" data-toggle="modal">
                New schedule</button>
        </div>
    </div>
    <div id="right" style="margin-left: 25px;">
        <div id="calendar"></div>
    </div>
</section>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.min.js"></script>
<script src="https://uicdn.toast.com/tui.dom/v3.0.0/tui-dom.js"></script>
<script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
<script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.0.13/chance.min.js"></script>
<script src="./calendar/dist/tui-calendar.js"></script>
<script src="./calendar/examples/js/data/calendars.js"></script>
<script src="./calendar/examples/js/data/schedules.js"></script>
<!-- <script src="./js/theme/dooray.js"></script> -->
<script src="./calendar/examples/js/app.js"></script>
</body>
</html>
