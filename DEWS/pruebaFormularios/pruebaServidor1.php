<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "name: ".$_FILES['imagen']['name']."\n";
        echo "</br>";
        echo "tmp_name: ".$_FILES['imagen']['tmp_name']."\n";
        echo "</br>";
        echo "size: ".$_FILES['imagen']['size']."\n";
        echo "</br>";
        echo "type: ".$_FILES['imagen']['type']."\n";
        if (is_uploaded_file ($_FILES['imagen']['tmp_name'] )){
            $nombreDirectorio = "subidas/";
            $nombreFichero = $_FILES['imagen']['name'];
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if (is_dir($nombreDirectorio)){ // es un directorio existente
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
            move_uploaded_file ($_FILES['imagen']['tmp_name'],$nombreCompleto);
            echo "</br>";
            echo "Fichero subido con el nombre: $nombreFichero<br>";
        }
        else 
            echo "Directorio definitivo inválido";
        }
        else
            print ("No se ha podido subir el fichero\n");
/*
        if (is_uploaded_file($_FILES['archivo_usuario']['tmp_name'])) {
            echo "El archivo ". $_FILES['archivo_usuario']['name'] ." fue cargado correctamente.\n";
            echo "Mostrando su contenido\n";
            readfile($_FILES['archivo_usuario']['tmp_name']);
        } 
        else{
            echo "Posible ataque de carga de archivo: ";
            echo "nombre de archivo '". $_FILES['archivo_usuario']['tmp_name'] . "'.";
        }
*/
    ?>
</body>
</html>