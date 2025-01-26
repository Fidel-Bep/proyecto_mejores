<?php 
require_once 'conexion.php';

//Usada en index.php
function login($nick, $password){
    global $db;
    if(comprobarNickExiste($nick)){
    
    $consulta_select="SELECT * FROM usuarios WHERE nick='$nick'";
    $resultado = mysqli_query($db, $consulta_select);
    $usuario = mysqli_fetch_assoc($resultado);
    if(password_verify($password, $usuario['password'])){
        $_SESSION['usuario'] = $usuario;
        
    }else{
            $$_SESSION['password_error'] = "Contraseña es incorrecta";
            header('Location: ../index.php');
            
        };
    }else{
        $_SESSION['nick_error'] = "Usuario es incorrecto";
        header('Location: ../index.php');
        
    };
}

//Usada en ver_amigos.php
function verAmigos($nick){
    global $db;
    $consulta_select="SELECT nick_usuario,nick_amigo,solicitud_amistad FROM amigos WHERE nick_usuario='$nick' 
    OR nick_amigo='$nick'";
    $resultado = mysqli_query($db, $consulta_select);    
    return $resultado;
}


//Usada funciones-query-select
function comprobarAmistadExisteSim($amigo, $nick){
    global $db;
    $consulta_select="SELECT * FROM amigos WHERE nick_usuario='$amigo' AND nick_amigo='$nick'";
    $resultado = mysqli_query($db, $consulta_select);
    
    if(mysqli_num_rows($resultado)!=0){
        return true;
    }else{
        return false;
    };
};
//Usada en insertar_amigo.php
function comprobarAmistadExiste($nick, $amigo){
    global $db;
    $consulta_select="SELECT * FROM amigos WHERE nick_usuario='$nick' AND nick_amigo='$amigo'";
    $resultado = mysqli_query($db, $consulta_select);
    
    if(mysqli_num_rows($resultado)!=0){
        return true;
    }elseif(comprobarAmistadExisteSim($amigo, $nick)){
        return true;
    }
    else{
        return false;
    };
};

function verSolicitudesAmistadPendientes($nick){
    global $db;
    $consulta_select="SELECT nick_usuario FROM amigos WHERE nick_amigo='$nick' AND solicitud_amistad='pendiente'";
    $resultado = mysqli_query($db, $consulta_select);
    
    return $resultado;
}

//Usada en ver_familiares.php
function verFamiliares($nick){
    global $db;
    $consulta_select="SELECT nick_usuario,nick_familiar,solicitud_familia FROM familiares WHERE nick_usuario='$nick' 
    OR nick_familiar='$nick'";
    $resultado = mysqli_query($db, $consulta_select);    
    return $resultado;
}


//Usada funciones-query-select
function comprobarFamiliaExisteSim($familiar, $nick){
    global $db;
    $consulta_select="SELECT * FROM familiares WHERE nick_usuario='$familiar' AND nick_familiar='$nick'";
    $resultado = mysqli_query($db, $consulta_select);
    
    if(mysqli_num_rows($resultado)!=0){
        return true;
    }else{
        return false;
    };
};
//Usada en insertar_amigo.php
function comprobarFamiliaExiste($nick, $familiar){
    global $db;
    $consulta_select="SELECT * FROM familiares WHERE nick_usuario='$nick' AND nick_familiar='$familiar'";
    $resultado = mysqli_query($db, $consulta_select);
    
    if(mysqli_num_rows($resultado)!=0){
        return true;
    }elseif(comprobarFamiliaExisteSim($familiar, $nick)){
        return true;
    }
    else{
        return false;
    };
};

function verSolicitudesFamiliaPendientes($nick){
    global $db;
    $consulta_select="SELECT nick_usuario FROM familiares WHERE nick_familiar='$nick' AND solicitud_familia='pendiente'";
    $resultado = mysqli_query($db, $consulta_select);
    
    return $resultado;
}

function verMetas(){
    global $db;
    $consulta_select="SELECT * FROM metas";
    $resultado = mysqli_query($db, $consulta_select);
    
    return $resultado;
}

function verMisMetas($nick){
    global $db;
    $consulta_select="SELECT m.nombre_meta, m.descripcion, m.id, mu.fecha_creacion, mu.puntuacion_meta FROM metas m
    INNER JOIN metas_usuario mu ON m.id=mu.id_meta
    WHERE mu.nick_usuario='$nick'";
    $resultado = mysqli_query($db, $consulta_select);
    return $resultado;
}