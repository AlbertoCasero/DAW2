<html>
    <body>
        <?php
            if(is_dir("../fechas"))
                echo "Es un directorio </br>";
            $directorio=opendir("../fechas");
            if($directorio){
                while (false !== ($fichero =readdir($directorio))) {
                    $fechaMod=filemtime("".$fichero);
                    echo "$fichero: ".date("d-m-Y",$fechaMod)." ".filesize($dir. $fichero)."bytes <br>";
                }
                closedir($dir);
            }else
                echo "No se ha podido abrir el directorio";
        ?>
    </body>
</html>