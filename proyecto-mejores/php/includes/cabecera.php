<?php
require_once 'functions/conexion.php';
require_once 'functions/funciones-query-select.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LOGGED</title>
</head>

<body>
    <header id="header">
        <?php if (isset($_SESSION['usuario'])): ?>

            <h1>Bienvenido <?php echo $_SESSION['usuario']['nick']; ?></h1>

            <?php if (isset($_SESSION['exito'])): ?>
                <h2> <?= $_SESSION['exito']; ?></h2>
                <?php unset($_SESSION['exito']); ?>
            <?php endif; ?>
            <a href="procesamiento_datos/logout.php">Cerrar Sesión</a>
        <?php endif; ?>
        <nav>
            <ul>
                <li><a href="logged.php">USUARIO</a>
                    <ul>
                        <li><a href="update_datos_v.php">Cambiar datos:</a></li>
                        <li><a href="ver_amigos_v.php">Ver amigos:</a></li>
                        <li><a href="ver_familiares_v.php">Ver familiares:</a></li>
                        <li><a href="ver_metas_v.php">Agregar metas:</a></li>
                    </ul>
                </li>
                
            </ul>
        </nav>
    </header>