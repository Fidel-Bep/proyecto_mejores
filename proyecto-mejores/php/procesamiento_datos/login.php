<?php 
require_once '../functions/conexion.php';
require_once '../functions/comprobar-datos.php';
require_once '../functions/validaciones.php';
require_once '../functions/funciones-query-select.php';


$nick = validacionAlfanumerico($_POST['nick']);

login($nick, $_POST['password']);

header('Location: ../logged_v.php');