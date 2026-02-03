<?php
session_start();
$_SESSION["contador"]++;
?>
<html>
    <body>
        <a href="contador2.php">Mostrar contador</a>
    </body>
</html>