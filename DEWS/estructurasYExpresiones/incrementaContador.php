<?php
    function incrementarContador ($cont){
        $cont++; echo $cont;
    }
    $contador=20;
    incrementarContador($contador);
    echo $contador;
    for($i=0;$i<10;$i++){
        echo "\n".$i;
    }
?>