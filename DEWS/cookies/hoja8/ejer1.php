<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Cookies</title>
</head>
<body>
    <?php
        $contar = 0;
        if(isset($_COOKIE["cosa"])){
            $contar = $_COOKIE["cosa"];
        }else{
            echo "No existe la cookie<br>";
        }
        $contar++;
        setcookie("cosa",$contar,time()+60*60*24*30,"/hoja8");
        echo "Has visitado esta pagina $contar veces<br>";
        echo "<a href='ejer1.php'>Enviar</a>";
    ?>
</body>
</html>