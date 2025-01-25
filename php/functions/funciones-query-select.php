<?php 
function login($nick, $password){
    global $db;
    if(comprobarNickExiste($nick)){
    var_dump($nick);
    $consulta_select="SELECT * FROM usuarios WHERE nick='$nick'";
    $resultado = mysqli_query($db, $consulta_select);
    $usuario = mysqli_fetch_assoc($resultado);
    if(password_verify($password, $usuario['password'])){
        $_SESSION['usuario'] = $usuario;
        
    }else{
            $$_SESSION['password_error'] = "Contraseña es incorrecta";
            
        };
    }else{
        $_SESSION['nick_error'] = "Usuario es incorrecto";
        
    };
}