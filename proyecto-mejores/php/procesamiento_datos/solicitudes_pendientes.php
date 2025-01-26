<?php
require_once '../functions/conexion.php';
require_once '../functions/funciones-query-update.php'; 

if($_GET['amistad']=='aceptada'){
    $resolucion='aceptada';
    resolverSolicitudAmistad($_SESSION['usuario']['nick'],$resolucion);
    header('Location: ../solicitudes_pendientes_v.php');
}else{
    $resolucion='rechazada';
    header('Location: ../solicitudes_pendientes_v.php');
}
?>