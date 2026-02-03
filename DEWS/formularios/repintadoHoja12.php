<html>
<body>
    <form action="repintadoHoja12.php" method="post">
        <?php
            $nombre= trim($_POST["user"]);
            $contrasena=($_POST["contrasena"]);
            echo $contrasena;
            echo "Usuario: <input type='text' name='user'>";
            if(empty($nombre)){
                echo "El usuario esta vacio";
            }
            echo "<br>";
            echo "Contraseña: <input type='password' name='contrasena'>";
            if(strlen($contrasena)<=6 || strlen($contrasena)>=12){
                echo "La contraseña no puede ser menor de 6 caracteres o mayor de 12";
            }else{
                echo "La contraseña esta bien puesta";
            }
            echo "<br>";
            echo "<input type='submit' value='aceptar'>"
        ?>
    </form>
</body>
</html>
