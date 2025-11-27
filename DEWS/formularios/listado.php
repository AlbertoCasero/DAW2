<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px" border-color="black">
        <tr>
            <th>IDProducto</th>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Jabon</td>
            <td>10</td>
            <td><?php echo '<a href="detallesProducto.php?id=',urlencode(1),'&nombre=jabon&precio=10">Detalles</a></td>'?>
        </tr>
        <tr>
            <td>2</td>
            <td>Cepillo</td>
            <td>15</td>
            <td><?php echo '<a href="detallesProducto.php?id=',urlencode(2),'&nombre=cepillo&precio=15">Detalles</a></td>'?>
        </tr>
        <tr>
            <td>3</td>
            <td>Vaso</td>
            <td>5</td>
            <td><?php echo '<a href="detallesProducto.php?id=',urlencode(3),'&nombre=vaso&precio=5">Detalles</a></td>'?>
        </tr>
    </table>
</body>
</html>