<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id=$_GET["id"];
        $nombre=$_GET["nombre"];
        $precio=$_GET["precio"];
        $dimensiones= array("1"=>"1x3","2"=>"2x2","3"=>"1x1");
        $color= array("1"=>"verde","2"=>"marron","3"=>"blanco");
        switch ($id) {
            case 1:
                echo $nombre.", " . $precio.", " . $dimensiones . ", " .$color[1];
                break;
            case 2:
                echo $nombre.", " . $precio.", " . $dimensiones[2] . ", " .$color[2];
                break;
            case 3:
                echo $nombre.", " . $precio.", " . $dimensiones[3] . ", " .$color[3];
                break;
            default:
                echo "No hay un producto con esa id";
                break;
        }
        $host = $_SERVER['HTTP_HOST'];
        $uri= rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        $extra = 'repintadoHoja12.php';
        //header("Location: http//$host$uri/$extra");
        //header("Refresh: 5; url=http://google.es");
        //echo "Lo que busca no existe, le redirijiremos a Google";
        //header('X-Powered-By: adivina-adivinanza');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment filename="downloaded.pdf"');
        readfile('original.pdf');
        exit;
    ?>
</body>
</html>