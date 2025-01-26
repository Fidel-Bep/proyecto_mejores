<?php require_once 'conexion.php'; 
function validacionAlfanumerico($string){
global $db;
    
        
        $string = mysqli_real_escape_string($db,trim($string));
    
    return $string;
    
    
};

function validacionEmail($email){
    global $db;
    
        $email_validado = filter_var(trim($email), FILTER_VALIDATE_EMAIL)? $email_validado = $email: $GLOBALS['email_error'] = "Email no válido";
        if(isset($_SESSION['email_error'])){
            return $_SESSION['email_error'];
        }else{
        $email = mysqli_real_escape_string($db,$email_validado);
        return $email;
        };
        
    
};

function validacionString($string){
    global $db;
    
        $string = mysqli_real_escape_string($db,trim($string));
        return $string;
    
};




