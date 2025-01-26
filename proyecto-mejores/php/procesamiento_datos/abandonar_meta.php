<?php
require_once '../functions/conexion.php';
require_once '../functions/funciones-query-delete.php';

$meta=$_GET['meta'];
var_dump($meta);
borrarMetaUsuario($_SESSION['usuario']['nick'],$meta);
header('Location: ../ver_metas_v.php');

