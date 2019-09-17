<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img/png" href="img/logo.jpg" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Sistema Web | TCD</title>
    <style type="text/css">
        html,body{
            height:100%;
            width:100%;
        }
        h1{
            background-image: linear-gradient(90deg, transparent 5%, rgba(233, 30, 99, 0.7) 30%, rgba(233, 30, 99, 0.7) 70%, transparent 95%);
            text-align: center;
            padding: 0 10%;
            margin-top:50px;
            text-align:center;
            color:white;
        }
    </style>
</head>
<body style="background-color:#f2f3f4;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="  background: #b92b27; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #b92b27, #1565c0); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #b92b27, #1565c0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;position: fixed; top: 0; width:100%; -moz-box-shadow: 2px 2px 5px #999;box-shadow: 2px 2px 5px #999; height: 60px;">
        <span style="color: #FFFFFF;"><strong>LOGIN</strong></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>
<br><br><br>


    <div id="login-main" style="margin-top:50px; width:350px; padding:25px; background-color: #fff; border-radius:5px; border-right: outset; border-bottom: outset; border-color: #eceff1;box-shadow: 2px 2px 10px #666;">
    
        <img id="login-img" src="img/logo.jpg" alt="logo" style="height: 175px; width: 175px; margin-left: 55px;margin-right: auto; margin-top: 2px; margin-bottom: 20px;">

        <div class="text-center text-danger">
            <?php
                if(isset($_GET["error"])){
                    echo "<p>Credenciales inválidas, intente nuevamente</p>";

                }
            ?>
        </div>

        <form method="post" action="Controller/login/procesar_login.php">
            <div class="form-group">
                    <input class="form-control" type="text" id="usuario" name="usuario" placeholder="Ingrese nombre de usuario" required style="background: #eceff1;">
            </div>
            <div class="form-group">  
                    <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese password" required style="background: #eceff1;">
            </div>  
            <div>
                <button type="submit" class="btn btn-primary" style="width: 50%; margin-left: 75px">Ingresar</button>        
            </div>    
        </form>
    
    </div>
</body>
</html>