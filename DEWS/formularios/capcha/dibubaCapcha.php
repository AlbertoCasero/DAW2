<?php
    if(isset($_GET['texto'])){
        $texto=$_GET['texto'];
    }else{
    die();
    }
    $img = @imagecreatefromjpeg('image.jpg');
    //Se adminten s—lo 5 caracteres
    if(strlen($texto)>5){
        $texto=substr($texto,0,5);
    }
    $texto = strtoupper($texto);
    for($i=0; $i<strlen($texto); $i++){
        //Se elige un color
        $color = imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
        //Se elige una ordenada
        $ordenada = rand(25,75);
        //Elegir una abcisa
        $abscisa = $i*40+rand(10,20);
        //Se elige un angulo
        $angulo = rand(0,75);
        $size = 20;
        //Se escribe el caracter en la imagen
        imagettftext($img,$size,$angulo,$abscisa, $ordenada,$color,"./arial.ttf",substr($texto,
        $i,1));
    }
    header('Content-Type: image/jpeg');
    imagejpeg($img);
    imagedestroy($img);
?>