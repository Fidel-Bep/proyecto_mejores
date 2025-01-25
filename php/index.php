<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>FORMULARIO REGISTRO</title>
    </head>
    <body>
        <form action="registro.php" method="post">
            <label for="nick">Nombre de Usuario:</label>
            <input type="text" name="nick" id="nick" required>
            <br>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" id="provincia" required>
            <br>
            <label for="municipio">Municipio:</label>
            <input type="text" name="municipio" id="municipio" required>
            <br>
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal" required>
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
            <input type="text" name="objetivo_moral" id="objetivo_moral" >
            <br>
            <label for="lema">Lema:</label>
            <input type="text" name="lema" id="lema" >
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>