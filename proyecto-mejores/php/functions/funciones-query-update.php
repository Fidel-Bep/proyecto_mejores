<?php require_once 'conexion.php'; 


function actualizarDatos($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $principios="", $objetivo_moral="", $lema="", $password){
    global $db;
    $cadena="";
    $nick!="" ? $nick_nuevo=$nick:'';
    $nick_actual=$_SESSION['usuario']['nick'];

    $array = array(
        'nick' => $nick,
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'email' => $email,
        'provincia' => $provincia,
        'municipio' => $municipio,
        'codigo_postal' => $codigo_postal,        
        'principios' => $principios,
        'objetivo_moral' => $objetivo_moral,
        'lema' => $lema,
        'password' => $password
    );

        
        foreach ($array as $key => $value) {
            if($value!=""){
                $cadena .="$key='$value', ";
            }
        };
        $cadena = substr($cadena, 0, -2);
        $consulta_update = "UPDATE usuarios SET $cadena WHERE nick='$nick_actual'";
        $resultado = mysqli_query($db, $consulta_update);
        if($resultado){
            $_SESSION['exito']="Actualización exitoso";
            $_SESSION['usuario']['nick']=$nick_nuevo;
            
            header('Location: ../logged_v.php');
            
        }else{
            $_SESSION['error_registro_actualizar']="Registro fallido al actualizar";
            header('Location: ../update_datos_v.php');
            
        };
   
};

function resolverSolicitudAmistad($nick_amigo,$resolucion){
    global $db;
    $nick_amigo=$_SESSION['usuario']['nick'];
    $consulta_update="UPDATE amigos SET solicitud_amistad='$resolucion' WHERE nick_amigo='$nick_amigo'";
    $resultado=mysqli_query($db, $consulta_update);

    return $resultado;
    
};
function resolverSolicitudFamilia($nick_familiar,$resolucion){
    global $db;
    $nick_familiar=$_SESSION['usuario']['nick'];
    $consulta_update="UPDATE familiares SET solicitud_familia='$resolucion' WHERE nick_familiar='$nick_familiar'";
    $resultado=mysqli_query($db, $consulta_update);

    return $resultado;
    
};

