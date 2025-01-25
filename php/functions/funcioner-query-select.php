<?php 
function login($nick, $password){
    global $db;
    if(comprobarNickExiste($nick)){
    $consulta_select="SELECT * FROM usuarios WHERE nick='$nick'";
    $resultado = mysqli_query($db, $consulta_select);
    $usuario = mysqli_fetch_assoc($resultado);
    if(password_verify($password, $usuario['password'])){
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    }else{
            $GLOBALS['password_error'] = "Contraseña es incorrecta";
            echo "Contraseña es incorrecta";
        };
    }else{
        $GLOBALS['nick_error'] = "Usuario es incorrecto";
        echo "Usuario es incorrecto";
    };
}