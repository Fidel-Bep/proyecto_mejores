<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php';
require_once 'functions/funciones-query-select.php';
$solicitudes = verSolicitudesFamiliaPendientes($_SESSION['usuario']['nick']);
?>
<main>
    <div class="container">
        <div class="friend">
            <a href="ver_familiares_v.php">Ver Familiares</a>
            <a href="ver_insertar_familiares_v.php">Agregar familiares</a>

            <h2>Solicitudes Pendientes</h2>
                <?php if(mysqli_num_rows($solicitudes)==0):;?>               
                    <p>No tienes solicitudes pendientes</p>     
                <?php else:;?>
                    <?php while ($solicitud = mysqli_fetch_assoc($solicitudes)):; ?>
                        <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                            <h3><?= $solicitud['nick_usuario']; ?></h3>
                            <a href="procesamiento_datos/solicitudes_pendientes_f.php?familia=aceptada">Aceptar</a>
                            <a href="procesamiento_datos/solicitudes_pendientes_f.php?familia=rechazada">Rechazar</a>
                        </div>
                    <?php endwhile; ?>
        
                <?php endif; ?>




        </div>
    </div>
</main>
</body>

</html>