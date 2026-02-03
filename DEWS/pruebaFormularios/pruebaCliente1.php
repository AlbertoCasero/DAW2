<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Inserción de la fotografía del usuario:
    <form action="pruebaServidor1.php" method="post" enctype="multipart/form-data">
    <?php
    echo "Nombre usuario:<input type='text' name='usuario'/><br/>";
    echo "Fichero con su fotografía:<input type='file' name='imagen'/><br/>";
    ?>
    <input type="submit" value="Enviar">
</body>
</html>