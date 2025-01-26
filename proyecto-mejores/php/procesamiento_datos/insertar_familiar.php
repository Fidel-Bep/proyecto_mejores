<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../functions/conexion.php';
require_once '../functions/comprobar-datos.php';
require_once '../functions/funciones-query-select.php';
require_once '../functions/funciones-query-insert.php';
require_once '../functions/validaciones.php';

$amigo = validacionAlfanumerico($_POST['nick_familiar']);
$nick_existe = comprobarNickExiste($amigo);
$familia_existe = comprobarFamiliaExiste($_SESSION['usuario']['nick'], $amigo);

if ($nick_existe && !$familia_existe) {
    insertarFamiliar($_SESSION['usuario']['nick'], $amigo);
    header('Location: ../ver_familiares_v.php');
} else {
    if ($familia_existe) {
        $_SESSION['error_familia'] = "Ya tienes una vinculación con este usuario. Comprueba tus solicitudes pendientes";
        header('Location: ../ver_insertar_familiares_v.php');
    } else {
        $_SESSION['error_nick'] = "El nick introducido no existe";
        header('Location: ../ver_insertar_familiares_v.php');
    }
}