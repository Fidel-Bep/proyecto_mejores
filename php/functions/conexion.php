<?php

 $db= mysqli_connect("localhost", "root", "", "mejores");
 
 if($db){
        echo "Conexión exitosa";
 }else{
        echo "Conexión fallida";
 }
 if(session_status() == PHP_SESSION_NONE){
    session_start();
 }