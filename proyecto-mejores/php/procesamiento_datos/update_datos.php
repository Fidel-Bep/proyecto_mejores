<?php 
require_once '../functions/conexion.php';
require_once '../functions/comprobar-datos.php';
require_once '../functions/cifrado.php';
require_once '../functions/validaciones.php';
require_once '../functions/funciones-query-insert.php';
require_once '../functions/funciones-query-update.php';


$nick = validacionAlfanumerico($_POST['nick']);


$nombre = validacionString($_POST['nombre']);
$apellidos = validacionString($_POST['apellidos']);

$email = validacionEmail($_POST['email']);

$provincia = validacionString($_POST['provincia']);

$municipio = validacionString($_POST['municipio']);

$codigo_postal = validacionAlfanumerico($_POST['codigo_postal']);

$principios = $_POST['principios']=="" ? "" :validacionString($_POST['principios']);

$objetivo_moral = $_POST['objetivo_moral']=="" ? "" :validacionString($_POST['objetivo_moral']);

$lema = $_POST['lema']=='' ? '' :validacionString($_POST['lema']);

$password = cifrarPassword($_POST['password']);
if(comprobarNickExiste($nick)){
    $_SESSION['nick_error'] = "El nick ya existe";
    header('Location: ../update_datos_v.php');
}elseif(comprobarEmailExiste($email)){
    
    $_SESSION['email_error'] = "El email ya existe";
    header('Location: ../update_datos_v.php');
};
if(!isset($_SESSION['nick_error']) && !isset($_SESSION['email_error'])){

    actualizarDatos($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $principios, $objetivo_moral, $lema, $password);
    header('Location: ../logged_v.php');
};
    
    