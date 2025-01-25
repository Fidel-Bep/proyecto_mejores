<?php require_once 'conexion.php'; ?>

<?php 

function registro($nick, $nombre, $apellidos, $email, $provincia, $municipio, $codigo_postal, $principios, $objetivo_moral, $lema, $password){
    global $db;
    $sql = "INSERT INTO usuarios (nick, nombre, apellidos, email, provincia, municipio, codigo_postal, principios, objetivo_moral, lema, password) VALUES ('$nick', '$nombre', '$apellidos', '$email', '$provincia', '$municipio', '$codigo_postal', '$principios', '$objetivo_moral', '$lema', '$password')";
    $resultado = mysqli_query($db, $sql);
    if($resultado){
        echo "Registro exitoso";
    }else{
        echo "Registro fallido";
    }
};

function validacionAlfanumerico($string=""){
global $db;
    if($string == ""){
        return false;
    }else{
        $string = mysqli_real_escape_string($db,preg_match("/^[a-zA-Z0-9!@#$%^&*(),.?:{}|<>]+$/",trim($string)));
    
    return $string;
    }
    
};

function validacionEmail($email=""){
    global $db;
    if($email == ""){
        return false;
    }else{
        $email = mysqli_real_escape_string($db,filter_var(trim($email), FILTER_VALIDATE_EMAIL));
        return $email;
    }
};

