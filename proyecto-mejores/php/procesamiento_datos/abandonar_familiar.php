<?php 
require_once '../functions/conexion.php';
require_once '../functions/funciones-query-delete.php';

$familiar=$_GET['familiar'];
var_dump($familiar);
borrarFamiliar($_SESSION['usuario']['nick'],$familiar);
borrarFamiliarSim($_SESSION['usuario']['nick'],$familiar);

//header('Location:../ver_familiares_v.php');