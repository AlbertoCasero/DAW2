<?php
    session_start();
    echo $contador;
?>
<html>
<body>
    <?php
        echo "contador ".$_SESSION["contador"];
    ?>
    <br><a href="contador1.php">[Volver]</a>
    <br><a href="contador3.php">[Terminar]</a>
</body>
</html>