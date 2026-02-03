<?php
function informacionTXT($ruta)
{
    $vehiculosPermitidos = [];
    $misVehiculos = fopen($ruta, 'r');
    if ($misVehiculos) {
        while ($linea = fgets($misVehiculos)) {
            $vehiculosPermitidos[] = trim($linea);
        }
        fclose($misVehiculos);

        $matrizInfo = [];
        foreach ($vehiculosPermitidos as $value) {
            $matrizInfo[] = explode(' ', $value);
        }
        return $matrizInfo;
    } else {
        die('Se cerró el flujo con el fichero');
    }
}

$camaras = informacionTXT('vehiculos.txt');
//Borrado de los vehiculos electricos
foreach ($camaras as $key => $value) {
    foreach ($value as $key1 => $value1) {
        if ($value1 === 'electrico') {
            unset($camaras[$key]);
        }
    }
    $camaras = array_values($camaras);
}
$permitidos = array_merge(informacionTXT('residentesYHoteles.txt'), informacionTXT('servicios.txt'), informacionTXT('taxis.txt'), informacionTXT('vehiculosEMT.txt'));
foreach ($camaras as $key => $value) {
    $matricula = $value[0];
    foreach ($permitidos as $key1 => $value1) {
        if ($matricula === $value1[0]) {
            unset($camaras[$key]);
        }
    }
    $camaras = array_values($camaras);
}
$logistica = informacionTXT('logistica.txt');
foreach ($camaras as $key => $value) {
    $matricula = $value[0];
    $momento = new DateTime($value[4]);
    $desde = new DateTime("6:00");
    $hasta = new DateTime("11:00");
    foreach ($permitidos as $key1 => $value1) {
        if ($matricula === $value1[0] && (($momento >= $desde && $momento <= $hasta))) {

            unset($camaras[$key]);
        }
    }
}
$camaras = array_values($camaras);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            text-align: center;
            justify-content: center;
            color: yellowgreen;
            background-color: gray;
        }
    </style>
</head>

<body>
    <div>
        <h1>Los vehiculos sancionados son:</h1>
        <?php
        foreach ($camaras as $key => $value) {
            echo "<p>Matricula: $value[0]</p><br>";
        }
        ?>

    </div>
</body>

</html>