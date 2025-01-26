<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/cabecera.php';
?>
<main>
    <div class="container">

        <a href="ver_metas_v.php">Ver mis Metas</a>

        <h1>Ahora mismo no tienes ninguna meta.Puedes enrolarte en una meta o crear una nueva</h1>
        <form action="procesamiento_datos/insertar_meta.php" method="POST">
            <label for="nombre_meta">Nombre de la meta:</label>
            <input list="meta" name="meta" id="meta" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+">
            <datalist id="metas">
                <?php $result = verMetas(); ?>
                <?php while ($meta = mysqli_fetch_assoc($result)) :; ?>
                    <option value="<?= $meta['nombre_meta']; ?>">
                    <?php endwhile; ?>
                
            </datalist>
            <?php if(isset($_SESSION['exito'])):;?> 
            <h2><?= $_SESSION['exito']; ?></h2>
            <?php unset($_SESSION['exito']); ?>
            <?php endif; ?>


            <input type="submit" value="Agregar meta">
        </form>








    </div>
    </div>
</main>
</body>

</html>