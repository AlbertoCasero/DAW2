<html>

<body>
    <?php
    $fechaActual = new DateTime('today');
    echo "Fecha actual " . $fechaActual->format("d-m-Y");
    $fechaDentroDeUnaSemana = new DateTime('2009-05-17');
    $fechaDentroDeUnaSemana->add(new DateInterval('P7D'));
    echo "<br>Fecha dentro de una semana " . $fechaDentroDeUnaSemana->format("Y-m-d");
    $fecha = new DateTime('19-10-2008 18:35');
    $diaNum = $fecha->format("d");
    $año = $fecha->format("Y");
    $hora = $fecha->format("H:i");
    $dia = $fecha->format('w');
    switch ($dia) {
        case 0:
            $d = "Domingo";
            break;
        case 1:
            $d = "Lunes";
            break;
        case 2:
            $d = "Martes";
            break;
        case 3:
            $d = "Miercoles";
            break;
        case 4:
            $d = "Jueves";
            break;
        case 5:
            $d = "Viernes";
            break;
        case 6:
            $d = "Sabado";
            break;
        default:
            "Dia no valido";
            break;
    }
    $mes = $fecha->format("m");
    switch ($mes) {
        case 1:
            $m = "Enero";
            break;
        case 2:
            $m = "Febrero";
            break;
        case 3:
            $m = "Marzo";
            break;
        case 4:
            $m = "Abril";
            break;
        case 5:
            $m = "Mayo";
            break;
        case 6:
            $m = "Junio";
            break;
        case 7:
            $m = "Julio";
            break;
        case 8:
            $m = "Agosto";
            break;
        case 9:
            $m = "Septiembre";
            break;
        case 10:
            $m = "Octubre";
            break;
        case 11:
            $m = "Noviembre";
            break;
        case 12:
            $m = "Diciembre";
            break;
        default:
            "Mes no valido";
            break;
    }
    echo "<br>a " . $d . ", " . $diaNum . " de " . $m . " de " . $año . ". A las " . $hora;
    ?>
</body>

</html>