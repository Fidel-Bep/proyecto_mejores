<?php 
require_once '../functions/conexion.php';
require_once '../functions/funciones-query-delete.php';

$amigo=$_GET['amistad'];

borrarAmigo($_SESSION['usuario']['nick'],$amigo);
borrarAmigoSim($_SESSION['usuario']['nick'],$amigo);

header('Location:../ver_amigos_v.php');