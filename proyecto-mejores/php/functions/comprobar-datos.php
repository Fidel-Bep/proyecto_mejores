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

function comprobarMetaExiste($meta){
    global $db;
    $consulta_select="SELECT * FROM metas WHERE nombre_meta='$meta'";
    $resultado = mysqli_query($db, $consulta_select);
    
    if(mysqli_num_rows($resultado)!=0){
        return true;    
    }else{
        return false;
    };
};