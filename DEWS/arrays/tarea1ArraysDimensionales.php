    <?php
    $paises=array(
        'España'=>array(
            'Madrid'=>array(
                'Extension'=>100000,
                'Habitantes'=>500
            ),
            'Toledo'=>array(
                'Extension'=>100000,
                'Habitantes'=>200
            )
        )
            );
    foreach($paises as $clave=>$valor){
        echo 'Regiones de '. $clave.'<br>';
        echo '<table border="1" cellpadding="1" cellspacing="2">';
        echo '<tr align="center">';
        echo '<td>Provincia</td>';
        echo '<td>Extension</td>';
        echo '<td>Habitantes</td>';
        echo '</tr>';
            foreach($valor as $clave1=>$valor1){
                echo '<tr align="center">';
                echo "<td>$clave1</td>";
                foreach($valor1 as $claver2=>$valor2){
                    echo "<td>$valor2</td>";
                }
                echo '</tr>';
            }
        echo '</table>';
    } 
    
    ?>