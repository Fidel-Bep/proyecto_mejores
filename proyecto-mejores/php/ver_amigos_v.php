<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php'; ?>


<main>
    <div class="container">

        <a href="ver_insertar_amigos_v.php">Agregar Amigo</a>
        <a href="solicitudes_pendientes_v.php">Solicitudes de Amistad Pendientes</a>
        <?php $result=verAmigos($_SESSION['usuario']['nick']);?>
        
        <?php if (mysqli_num_rows($result)==0): ;?>
        
            <?php header('Location: ver_insertar_amigos_v.php'); ?>
        
        <?php else: ;?>
        
        <h2>Amigos</h2>
        
        <?php while ($amigo = mysqli_fetch_assoc($result)): ;?>
            <?php if($amigo['nick_usuario']==$_SESSION['usuario']['nick']):; ?>
                 <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                 <h3><?= $amigo['nick_amigo']; ?></h3>
                 <p><?= $amigo['solicitud_amistad']; ?></p>
                 <p><a href="procesamiento_datos/abandonar_amistad.php?amistad=<?=$amigo['nick_amigo']?>">Abandonar Amistad</a></p>
             </div>
            <?php else:; ?>

                <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <h3><?= $amigo['nick_usuario']; ?></h3>
                <p><?= $amigo['solicitud_amistad']; ?></p>
                <p><a href="procesamiento_datos/abandonar_amistad.php?amistad=<?=$amigo['nick_usuario']?>">Abandonar Amistad</a></p>
           <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>


    </div>
    </div>
</main>
</body>

</html>