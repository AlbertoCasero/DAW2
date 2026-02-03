<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="otroFormulario.php" method="post">
    Introduzca la cadena a buscar: <input type="text" name="cadena" value="valor por defecto" size="20">
    <input type="submit" value="aceptar" name="aceptar">
    </form>
    <?php
    if (isset($_POST['aceptar'])){
        $cadena=$_POST['cadena'];
        echo $cadena;  
    }
    ?>
</body>
</html>