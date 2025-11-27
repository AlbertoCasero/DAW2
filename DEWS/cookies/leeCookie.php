<html>
    <body>
        <?php
            if(isset($_COOKIE["usuario"])){
                echo "La cookie dice: ".$_COOKIE["usuario"];
            }else{
                echo "No existe la cookie";
            }
        ?>
    </body>
</html>