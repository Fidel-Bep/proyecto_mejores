<?php
require_once '../functions/conexion.php';
require_once '../functions/funciones-query-update.php'; 

if($_GET['familia']=='aceptada'){
    $resolucion='aceptada';
    resolverSolicitudFamilia($_SESSION['usuario']['nick'],$resolucion);
    header('Location: ../solicitudes_pendientes_f_v.php');
}else{
    $resolucion='rechazada';
    header('Location: ../solicitudes_pendientes_f_.php');
}
?>