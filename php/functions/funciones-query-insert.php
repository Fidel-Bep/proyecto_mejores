<?php require_once 'conexion.php'; ?>
<?php require_once 'comprobar-datos.php'; ?>
<?php 

function registro($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $principios="", $objetivo_moral="", $lema="", $password){
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
    var_dump(
        $resultado
    );
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





