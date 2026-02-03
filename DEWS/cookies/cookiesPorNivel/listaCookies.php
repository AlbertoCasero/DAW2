<?php

echo "<h2>Cookies de este nivel</h2>";

    if (count($_COOKIE) == 0) {
        echo "No hay cookies en este nivel.<br><br>";
    } else {
        echo "<table border='1' cellpadding='5'>
            <tr><th>Nombre</th><th>Contenido</th></tr>";

        foreach ($_COOKIE as $nombre => $valor) {
            echo "<tr><td>$nombre</td><td>$valor</td></tr>";
        }

        echo "</table><br>";
    }

echo "</table><br>";
echo "<a href='index.html'>Volver al índice</a>";
?>
