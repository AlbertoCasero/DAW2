<html>
    <body>
        <?php
        $fichero=fopen("holamundo.txt","r");
        if(!$fichero){
            die("Error: no se ha podido abrir el fichero de datos");
        }
        while (!feof($fichero)) {
            echo fgets($fichero)."<br>";
        }
        fclose($fichero);

        $fichero2 = file('holamundo.txt');
        foreach($fichero2 as $linea)
        echo $linea . '<br>';

        /*$fichero3 = file('http://www.upm.es');
        foreach($fichero3 as $linea)
        echo $linea;*/
        
        /*$a = fopen('holamundo.txt', 'a+');
        if(!$a){
            die("Error: no se ha podido abrir el fichero de datos");
        }
        fwrite($a,"nueva linea\n");
        fputs($a,"otra linea\n");
        fclose($a);*/
        
        $a2=fopen("holamundo.txt","a+");
        if(!$a2){
            die("Error: no se ha podido abrir el fichero de datos");
        }
        rewind($a2);
        fputs($a2,"linea al principio\n");
        fclose($a2);
        ?>
    </body>
</html>