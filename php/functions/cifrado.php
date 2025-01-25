<?php require_once 'conexion.php';

function cifrarPassword($password){
    $password = password_hash($password, PASSWORD_DEFAULT);
    return $password;
};

function descifrarLoginPassword($password,$nombre_usuario){
    global $db;
    $consulta_select="SELECT password FROM usuarios WHERE nick='$nombre_usuario'";
    $resultado = mysqli_query($db, $consulta_select);
    $password_hash =mysqli_fetch_assoc($resultado);
    if(password_verify($password, $password_hash['password'])){
        return true;
    }else{
        return false;
    }
};