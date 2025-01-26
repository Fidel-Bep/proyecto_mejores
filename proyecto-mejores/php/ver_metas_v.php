<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php';
require_once 'functions/funciones-query-select.php'
?>
<main>
    <div class="container">

        <a href="ver_insertar_metas_v.php">Alcanzar una Meta</a>
        
        <?php $result=verMisMetas($_SESSION['usuario']['nick']);?>
        
        <?php if (mysqli_num_rows($result)==0): ;?>
        
            <?php header('Location: ver_insertar_metas_v.php'); ?>
        
        <?php else:;?>
        
        
        <h2><?='Metas'?></h2>
            <?php $mis_metas=verMisMetas($_SESSION['usuario']['nick']);?>
            <?php while ($meta = mysqli_fetch_assoc($mis_metas)):;?>
                <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <h3><?= $meta['nombre_meta']; ?></h3>
                <p><?= $meta['descripcion']; ?></p>
                <p><?= $meta['fecha_creacion']; ?></p>

                <p><?=$meta['puntuacion_meta']; ?></p>
                <a href="procesamiento_datos/abandonar_meta.php?meta=<?=$meta['id']?>">Abandonar</a>
                <?php endwhile;?>
        <?php endif; ?>
        
        


    </div>
    </div>
</main>
</body>

</html>
