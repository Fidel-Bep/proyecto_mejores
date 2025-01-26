<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php'; ?>


<main>
    <div class="container">
        <div class="friend">
            <a href="ver_amigos_v.php">Ver Amigos</a>
            <a href="solicitudes_pendientes_v.php">Solicitudes pendientes</a>


            <?php if (isset($_SESSION['error_nick'])): ?>
                <h2><?= $_SESSION['error_nick']; ?></h2>
                <?php unset($_SESSION['error_nick']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_amistad'])): ?>
                <h2><?= $_SESSION['error_amistad']; ?></h2>
                <?php unset($_SESSION['error_amistad']); ?>
            <?php endif; ?>

            <h2>Agregue a un amigo</h2>

            <form action="procesamiento_datos/insertar_amigo.php" method="POST">
                <label for="nick_amigo">Nick del amigo:</label>
                <input type="text" name="nick_amigo" id="nick_amigo" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+">
                <input type="submit" value="Agregar amigo">
            </form>




        </div>
    </div>
</main>
</body>

</html>