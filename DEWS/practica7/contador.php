<html>
    <body>
        <?php
            $fichero=fopen("visitas.txt","r+");
            if(!$fichero){
                die("Error: No se puede leer el fichero");
            }
            $contador=fgets($fichero,8);
            echo "Esta es la visita número $contador";
            $contador=$contador+1;
            rewind($fichero);
            fputs( $fichero,$contador);
            fclose($fichero);
        ?>
    </body>
</html>