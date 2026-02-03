<html>
    <body>
        <?php
            $fichero=fopen("datos.txt","r");
            while(!feof($fichero)){
                $line=fgets($fichero);
                echo $line."<br>";
            }
            fclose($fichero);
        ?>
    </body>
</html>