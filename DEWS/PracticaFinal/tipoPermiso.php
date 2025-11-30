<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function tiposDePermisos($pathPermisos){
        $permisos = fopen($pathPermisos, 'r');
        if ($permisos) {
            $losPermisos = "";
            echo "<select name='permiso'>";
            while (!feof($permisos)) {
                $losPermisos .= fgets($permisos);
            }
            fclose($permisos);
            $pintaPermisos = explode(',', $losPermisos);
            foreach ($pintaPermisos as $key => $value) {

                echo "<option value=$value>$value</option>";
            }
            echo '</select>';
        } else {
            die('Se ha cerrado el flujo con el archivo');
        }
    }

    ?>
    <h1>Seleccione el tipo de permiso</h1>
    <form action="procesamientoPermiso.php" method="post">
        <label>Tipo:</label><br>
        <?php tiposPermisos("permisos.txt"); ?><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>