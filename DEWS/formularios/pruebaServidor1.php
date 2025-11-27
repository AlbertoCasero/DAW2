<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (is_uploaded_file ($_FILES['imagen']['tmp_name'] )){
            echo "name: ".$_FILES['imagen']['name'];
            echo "</br>";
            echo "tmp_name: ".$_FILES['imagen']['tmp_name'];
            echo "</br>";
            echo "size: ".$_FILES['imagen']['size'];
            echo "</br>";
            echo "type: ".$_FILES['imagen']['type'];
            $nombreDirectorio = "subidas/";
            $nombreFichero = $_FILES['imagen']['name'];
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
            if(strstr($_FILES['imagen']['type'],"/jpeg")){
                if($_FILES['imagen']['size']<=7000){
                    if (is_dir($nombreDirectorio)){ // es un directorio existente
                        $idUnico = time();
                        $nombreFichero = $idUnico."-".$nombreFichero;
                        $nombreCompleto = $nombreDirectorio.$nombreFichero;
                        move_uploaded_file ($_FILES['imagen']['tmp_name'],$nombreCompleto);
                        echo "</br>";
                        echo "Fichero subido con el nombre: $nombreFichero<br>";
                    }
                    else echo "Directorio definitivo inválido";
                }else {
                    echo "</br>";
                    echo "El tamaño es mayor a 1gb";
                }
            }else{
                echo "El fichero introducido no es un /jpeg.";
            }
        }
        else
            print ("No se ha podido subir el fichero\n");
    ?>
</body>
</html>