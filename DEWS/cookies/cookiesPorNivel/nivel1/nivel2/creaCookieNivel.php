<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombre = $_GET["nombre"];
    $contenido = $_GET["contenido"];
    $ruta = "cookiesPorNivel/nivel1/nivel2";
    setcookie($nombre, $contenido, time() + 3600, $ruta);
    echo "<h2>Cookie creada</h2>";
    echo "Nombre: $nombre<br>";
    echo "Contenido: $contenido<br>";
    echo "Ruta: $ruta<br><br>";
    echo "<a href='../../index.html'>Volver al índice</a>";
    ?>
</body>
</html>