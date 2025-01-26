<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php'; ?>


<main>
    <div class="container">

        <a href="ver_insertar_familiares_v.php">Agregar Familiar</a>
        <a href="solicitudes_pendientes_f_v.php">Solicitudes de Familia Pendientes</a>
        <?php $result=verFamiliares($_SESSION['usuario']['nick']);?>
        
        <?php if (mysqli_num_rows($result)==0): ;?>
        
            <?php header('Location: ver_insertar_familiares_v.php'); ?>
        
        <?php else: ;?>
        
        <h2>Familiares</h2>
        
        <?php while ($familiar = mysqli_fetch_assoc($result)): ;?>
            <?php if($familiar['nick_usuario']==$_SESSION['usuario']['nick']):; ?>
                 <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                 <h3><?= $familiar['nick_familiar']; ?></h3>
                 <p><?= $familiar['solicitud_familia']; ?></p>
             </div>
            <?php else:; ?>

                <div class="friend" style="border: 1px solid black; padding: 10px; margin: 10px;">
                <h3><?= $familiar['nick_usuario']; ?></h3>
                <p><?= $familiar['solicitud_familia']; ?></p>
           <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>


    </div>
    </div>
</main>
</body>

</html>