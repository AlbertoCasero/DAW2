<html>
    <body>
        <?php
            $fichero=fopen("/var/www/html/DEWS/fechas/fechas.php","r");
            $fichero2=fopen("fich_salida.txt","w");
            if(!$fichero){
                die("Error: No se puede leer el fichero");
            }
            if(!$fichero2){
                die("Error: No se puede crear el fichero");
            }
            $size=0;
            while (!feof($fichero)) {
                $line=fgets($fichero);
                $size+=fputs( $fichero2 , $line);
            }
            echo "El archivo pesa $size bytes";
            fclose( $fichero );
            fclose( $fichero2 );
        ?>
    </body>
</html>
