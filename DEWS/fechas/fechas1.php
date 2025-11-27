<?php
    $formato="d-m-Y H:i:s";
	$fecha=new DateTime();
	echo $fecha->format($formato);
    $hoy=new DateTime('now');
    echo "<br>". $hoy->format($formato);
    $ayer=new DateTime('yesterday');
    echo "<br>". $ayer->format($formato);
    $maniana=new DateTime('tomorrow');
    echo "<br>". $maniana->format($formato);
    $zona1=new DateTimeZone('Europe/Madrid');
    $nuevaFecha=new DateTime('2011-01-25');
    $nuevaFecha->sub(new DateInterval('P10Y'));
    echo "<br>".$nuevaFecha->format($formato);
    $intervalo=$ayer->diff($maniana);
    echo "<br>".$intervalo->format('%R%a dias');
    
?>