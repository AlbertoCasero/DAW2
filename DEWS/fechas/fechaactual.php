<html>
    <body>
        <?php
        $fechaActual=new DateTime("9-11-2025");
        echo $fechaActual->format("l");
        $fecha2=new DateTime("03-05-2009 08:22:51");
        $fecha2Dia=$fecha2->format("l");
        $fecha2Mes=$fecha2->format("F");
        $fecha2DiaNum=$fecha2->format("d");
        echo "<br>".$fecha2Dia.", ".$fecha2DiaNum." of ".$fecha2Mes." ".$fecha2->format("Y")
        . " ". $fecha2->format("H:i:s")." PM";
        ?>
    </body>
</html>