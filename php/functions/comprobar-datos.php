<?php require_once 'conexion.php';

function comprobarNickExiste($nick){
global $db;
$consulta_select="SELECT * FROM usuarios WHERE nick='$nick'";
$resultado = mysqli_query($db, $consulta_select);
$usuario = mysqli_fetch_assoc($resultado);
if($usuario!=null){
    return true;    
};
};

function comprobarEmailExiste($email){
    global $db;
    $consulta_select="SELECT * FROM usuarios WHERE email='$email'";
    $resultado = mysqli_query($db, $consulta_select);
    $usuario = mysqli_fetch_assoc($resultado);
    if($usuario!=null){
        return true;    
    };
}