<?php
session_start(); //necesitamos obtener la sesión del usuario actual

if(session_destroy());{//se destruyen todas las variables utilizadas SESSION"usuario"
    header("Location: login.php");
    exit();
}

?>