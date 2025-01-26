<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php'; ?>


<main>
    <div class="container">
        <div class="friend">
            <a href="ver_familiares_v.php">Ver Familiares</a>
            <a href="solicitudes_pendientes_f_v.php">Solicitudes pendientes</a>


            <?php if (isset($_SESSION['error_nick'])): ?>
                <h2><?= $_SESSION['error_nick']; ?></h2>
                <?php unset($_SESSION['error_nick']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_familia'])): ?>
                <h2><?= $_SESSION['error_familia']; ?></h2>
                <?php unset($_SESSION['error_familia']); ?>
            <?php endif; ?>

            <h2>Agregue a un familiar</h2>

            <form action="procesamiento_datos/insertar_familiar.php" method="POST">
                <label for="nick_familiar">Nick del familiar:</label>
                <input type="text" name="nick_familiar" id="nick_familiar" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+">
                <input type="submit" value="Agregar familiar">
            </form>




        </div>
    </div>
</main>
</body>

</html>