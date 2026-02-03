<?php
    setcookie("usuario","cas",time()+3600);
    echo "Cookie creada";
?>
<html>
    <body>
        <?php
            echo "<a href='leeCookie.php'>Leer</a>";
        ?>
    </body>
</html>