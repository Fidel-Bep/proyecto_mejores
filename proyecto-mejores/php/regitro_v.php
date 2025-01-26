<?php 
require_once 'functions/conexion.php';

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>FORMULARIO</title>
    </head>
    <body>
    <?php 

?>
        <h1>Formulario de Registro</h1>
        <?php if(isset($_SESSION['exito'])): ?>
           <h2> <?=  $_SESSION['exito']; ?></h2>
            <?php unset($_SESSION['exito']);?>
            <?php endif; ?>
        <form action="procesamiento_datos/registro.php" method="post">
            <label for="nick">Nick de Usuario:</label>
            <input type="text" name="nick" id="nick" pattern="[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+" required>
            <br>
            <?php if(isset($_SESSION['nick_error'])): ?>
           <h2> <?=  $_SESSION['nick_error']; ?></h2>
            <?php unset($_SESSION['nick_error']);?>
            <?php endif; ?>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <?php if(isset($_SESSION['email_error'])): ?>
           <h2> <?=  $_SESSION['email_error']; ?></h2>
            <?php unset($_SESSION['email_error']);?>
            <?php endif; ?>
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" id="provincia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="municipio">Municipio:</label>
            <input type="text" name="municipio" id="municipio" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" required>
            <br>
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\-s 0-9]+" required>
            <br>
            <label for="principios">Principios:</label>
            <select name="principios" id="principios" >
                <option value="Religiosos">Religiosos</option>
                <option value="Espirituales">Espirituales</option>
                <option value="Ideológicos">Ideológicos</option>
                <option value="Éticos">Éticos</option>
                <option value="Otros">Otros</option>
            </select>
            <label for="objetivo_moral">Objetivo Moral:</label>
            <input type="text" name="objetivo_moral" id="objetivo_moral" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.,:;¿?¡!]+">
            <br>
            <label for="lema">Lema:</label>
            <input type="text" name="lema" id="lema" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.,:;¿?¡!]+">
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <?php if(isset($_SESSION['usuario'])): ?>
            <h1>Bienvenido <?php echo $_SESSION['usuario']['nick']; ?></h1>
            <a href="procesamiento_datos/logout.php">Cerrar Sesión</a>
<?php endif; ?>
        
    <?php if(isset($_SESSION['exito'])): ?>
            <?php unset($_SESSION['exito']);?>
    <?php endif; ?>
    </body>
    </html>
