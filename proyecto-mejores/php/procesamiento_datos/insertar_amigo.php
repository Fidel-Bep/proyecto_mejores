<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../functions/conexion.php';
require_once '../functions/comprobar-datos.php';
require_once '../functions/funciones-query-select.php';
require_once '../functions/funciones-query-insert.php';
require_once '../functions/validaciones.php';

$amigo = validacionAlfanumerico($_POST['nick_amigo']);
$nick_existe = comprobarNickExiste($amigo);
$amistad_existe = comprobarAmistadExiste($_SESSION['usuario']['nick'], $amigo);

if ($nick_existe && !$amistad_existe) {
    insertarAmigo($_SESSION['usuario']['nick'], $amigo);
    header('Location: ../ver_amigos_v.php');
} else {
    if ($amistad_existe) {
        $_SESSION['error_amistad'] = "Ya tienes una vinculación con este usuario. Comprueba tus solicitudes pendientes";
        header('Location: ../ver_insertar_amigos_v.php');
    } else {
        $_SESSION['error_nick'] = "El nick introducido no existe";
        header('Location: ../ver_insertar_amigos_v.php');
    }
}
