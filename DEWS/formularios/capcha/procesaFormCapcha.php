<?php
    $captchaCorrecto="hola";
    $captcha=$_POST['captcha'];
    if($captchaCorrecto==$captcha){
        echo "El usuario es: ".$_POST['user'];
        echo "</br>"."La contraseña es: ".$_POST['pass'];
    }else{
        echo "El captcha introducido es erroneo";
    }
?>