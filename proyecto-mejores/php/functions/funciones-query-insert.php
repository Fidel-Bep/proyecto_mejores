<?php require_once 'conexion.php'; ?>
<?php require_once 'comprobar-datos.php'; ?>
<?php 

function registro($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $password,$principios="", $objetivo_moral="", $lema=""){
    global $db;
    $cadena="";
    $array = array(
        
        'principios' => $principios,
        'objetivo_moral' => $objetivo_moral,
        'lema' => $lema
    );

    $consulta_insert = "INSERT INTO usuarios (nick, nombre, apellidos, email, provincia, municipio, codigo_postal, password) 
    VALUES ('$nick', '$nombre', '$apellidos', '$email', '$provincia', '$municipio', '$codigo_postal', '$password')";
    $resultado = mysqli_query($db, $consulta_insert);
   
    
    if($resultado){
        
        foreach ($array as $key => $value) {
            if($value!=""){
                $cadena .="$key='$value', ";
            }
        }
        $cadena = substr($cadena, 0, -2);
        $consulta_update = "UPDATE usuarios SET $cadena WHERE nick='$nick'";
        $resultado = mysqli_query($db, $consulta_update);
        if($resultado){
            $_SESSION['exito']="Registro exitoso";
            
        }else{
            $_SESSION['error_registro_actualizar']="Registro fallido al actualizar";
            
        }
    }else{
        $_SESSION['error_registro_insertar']="Registro fallido al insertar";
    }
    
};

function insertarAmigo($nick, $amigo){
    global $db;
    $consulta_insert = "INSERT INTO amigos (nick_usuario, nick_amigo, solicitud_amistad) 
    VALUES ('$nick', '$amigo', 'pendiente')";
    $resultado = mysqli_query($db, $consulta_insert);
    if($resultado){
        $_SESSION['exito']="Solicitud de amistad enviada";
    }else{
        $_SESSION['error']="Solicitud de amistad fallida";
    }
};

function insertarFamiliar($nick, $familiar){
    global $db;
    $consulta_insert = "INSERT INTO familiares (nick_usuario, nick_familiar, solicitud_familia) 
    VALUES ('$nick', '$familiar', 'pendiente')";
    $resultado = mysqli_query($db, $consulta_insert);
    if($resultado){
        $_SESSION['exito']="Solicitud de familia enviada";
    }else{
        $_SESSION['error']="Solicitud de familia fallida";
    }
};

function insertarMeta($meta){
    global $db;
    $consulta_insert="INSERT INTO metas (meta) VALUES ('$meta')";
    $resultado = mysqli_query($db, $consulta_insert);
    return $resultado;
}

function insertarMetaUsuario($nick, $meta){
    global $db;
    $consulta_insert="INSERT INTO metas_usuario (nick_usuario, id_meta) 
    SELECT '$nick',id
    FROM metas
    WHERE nombre_meta='$meta'";
    $resultado = mysqli_query($db, $consulta_insert);
    return $resultado;
}







