<?php
require_once '../functions/conexion.php';
require_once '../functions/funciones-query-insert.php';
require_once '../functions/validaciones.php';
require_once '../functions/comprobar-datos.php';


$meta=validacionAlfanumerico($_POST['meta']);

$existencia=comprobarMetaExiste($meta);


if($existencia){
    insertarMetaUsuario($_SESSION['usuario']['nick'],$meta);
    $_SESSION['exito']='Meta agregada con éxito';
    header('Location: ../ver_insertar_metas_v.php');
}else{
    insertarMeta($meta);
    insertarMetaUsuario($_SESSION['usuario']['nick'],$meta);
    $_SESSION['exito']='Meta agregada con éxito';
    header('Location: ../ver_insertar_metas_v.php');
};