<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_COOKIE["usuario"])){
            $dats=explode(" ",$_COOKIE["usuario"]);
            foreach ($dats as $actual) {
                echo $actual;
            }
        }else{
            echo "La cookie no existe";
        }
        echo "<form action='ejer2.php' method='post'>";
        echo "Usuario <input type='text' name='user'><br>";
        echo "Contraseña <input type='text' name='contra'><br>";
        echo "<input type='submit' value='Enviar'>";
        echo "</form>";
        $usuario=$_POST["user"];
        $usuarioAnter=$usuario;
        $contraseña=$_POST["contra"];
        $contraAnter=$contraseña;
        $datos="$usuario $contraseña";
        setcookie("usuario","$datos",time()+60*60*24*30,"/hoja8");
    ?>
</body>
</html>