<?php
    $idiomas=array('Alejandro'=>'Ingles',
            'DavidR'=>'Frances',
            'DavidRomo'=>array('Inglés','Francés'),
            'Roy'=>'Alemán');
    print_r($idiomas);
    echo '<pre>';
    var_dump($idiomas);
    echo '</pre>';

    unset($idiomas['DavidR']);

    foreach($idiomas as $clave=>$valor){
        if(is_array($valor)){
            echo ' El alumno '.$clave . ' habla los siguientes idiomas:' .$valor;
            echo '<ul>';
            foreach($valor as $clave1=>$valor1)
                echo '<li>'.$valor1.'</li>';
            echo '</ul>';
        }
        else echo ' El alumno '.$clave . ' habla ' .$valor;
    }
?>