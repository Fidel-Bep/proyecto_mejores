
<?php 
require_once '../functions/conexion.php';
require_once '../functions/comprobar-datos.php';
require_once '../functions/cifrado.php';
require_once '../functions/validaciones.php';
require_once '../functions/funciones-query-insert.php';

echo 'hola';
$nick = validacionAlfanumerico($_POST['nick']);
echo $nick;

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
}elseif(comprobarEmailExiste($email)){
    
    $_SESSION['email_error'] = "El email ya existe";
}
    
if(!isset($_SESSION['nick_error']) && !isset($_SESSION['email_error'])){

    registro($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $principios, $objetivo_moral, $lema, $password);
};
    
    header('Location: ../index.php');
