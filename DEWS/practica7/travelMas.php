<html>
    <body>
        <?php
            echo "<h1>Agencia de viajes travelmas</h1>";
            $fichero=fopen("viajes.txt","a+");
            $nombre=$_GET["nombre"];
            if(!empty($nombre)){
                $nombreValido=true;
            }
            $destino=$_GET["destino"];
            if(!empty($destino)){
                $destinoValido=true;
            }
            $duracion=$_GET["duracion"];
            if(!empty($duracion)){
                $duracionValido=true;
            }
            $salida=$_GET["salida"];
            if(!empty($salida)){
                $salidaValido=true;
            }
            if($nombreValido && $destinoValido && $duracionValido && $salidaValido){
                $datos=$nombre.":".$destino.":".$duracion.":".$salida."\n";
                fputs($fichero,$datos);
            }else{
                echo "Datos no validos";
            }
            echo "<table border='1px solid black'>";
            echo "<tr>";
            echo "<td>Nombre</td>";
            echo "<td>Destino</td>";
            echo "<td>Duracion</td>";
            echo "<td>Salida</td>";
            echo "</tr>";
            rewind($fichero);
            fgets($fichero);
            while(!feof($fichero)){
                echo "<tr>";
                $line=fgets($fichero);
                $partes=explode(":", $line);
                foreach($partes as $actual){
                    echo "<td>$actual</td>";
                }
                echo "</tr>";
            }
            fclose($fichero);
            echo "</table>";
            echo "<br>";
            echo "<form action='travelMas.php' method='get'>";
            echo "<table border='1px solid black'>";
            echo "<tr>";
                echo "<td>Introduzca el nombre del circuito</td>";
                echo "<td><input type='text' name='nombre'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Introduzca el destino</td>";
                echo "<td><input type='text' name='destino'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Introduzca la duracion</td>";
                echo "<td><input type='text' name='duracion'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Introduzca los dias de salida</td>";
                echo "<td><input type='text' name='salida'></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td colspan='2'><input type='submit' value='Enviar'></td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
        ?>
    </body>
</html>