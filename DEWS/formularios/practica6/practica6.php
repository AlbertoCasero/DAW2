<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $coches=array('BMW','Honda', 'Honda', 'BMW', 'Toyota', 'Mercedes', 'Honda', 'Ford', 'Mercedes',
'BMW','Ford','Mercedes','Ford','Honda','Honda','Toyota','BMW','Honda','Toyota','Mercedes',
'Honda','Ford','Ford','Ford','Mercedes','BMW','Honda','Toyota','Toyota','Mercedes','Mercedes'
,'Honda','Honda','BMW','Mercedes','Mercedes','Honda','Honda','Ford','BMW','Honda','Ford','Toyota','Honda','BMW','Ford','Mercedes','Ford','Toyota');
        $cantCoches=array_count_values($coches);
        foreach ($cantCoches as $actual) {
            echo $actual."</br>";
        }
    ?>
</body>
</html>
