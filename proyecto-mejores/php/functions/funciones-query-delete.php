<?php require_once 'conexion.php';

function borrarMetaUsuario($nick,$meta){
    global $db;
    $consulta_delete="DELETE FROM metas_usuario WHERE nick_usuario='$nick' AND id_meta='$meta'";
    $resultado = mysqli_query($db, $consulta_delete);
    return $resultado;
}

function borrarAmigoSim($amigo,$nick){
    global $db;
    $consulta_delete="DELETE FROM amigos WHERE nick_usuario='$amigo' AND nick_amigo='$nick'";
    $resultado = mysqli_query($db, $consulta_delete);
    if($resultado){
        return true;
    }

};

function borrarAmigo($nick,$amigo){
    global $db;
    $consulta_delete="DELETE FROM amigos WHERE nick_usuario='$nick' AND nick_amigo='$amigo'";
    mysqli_query($db, $consulta_delete);
    if(mysqli_affected_rows($db)!=0){
        return true;
    }else{
        if(borrarAmigoSim($amigo,$nick)){
            return true;
        };
    };
    
};

function borrarFamiliarSim($familiar,$nick){
    global $db;
    $consulta_delete="DELETE FROM familiares WHERE nick_usuario='$familiar' AND nick_familiar='$nick'";
    $resultado=mysqli_query($db, $consulta_delete);
    return $resultado;
    
    

};

function borrarFamiliar($nick,$familiar){
    global $db;
    
    $consulta_delete="DELETE FROM familiares WHERE nick_usuario='$nick' AND nick_familiar='$familiar'";
    mysqli_query($db, $consulta_delete);
    if(mysqli_affected_rows($db)!=0){
        return true;

    }elseif (borrarFamiliarSim($familiar,$nick)){
       return true;
    };
    

};


