<?php
    echo stristr("carmenduran@domenicoscarlat.es","@domenico");
    echo "<br></br>";
    echo strrpos ("Este espacio es muy bonito","es",7);
    echo "<br></br>";
    //MUY IMPORTANTE STRCSPN
    echo strcspn ("Micadena$","$,-,_;");
    echo "<br></br>";
    echo strnatcmp("10","2");
    echo "<br></br>";
    $cadena="Hola que tal";
    //STRLEN cuenta los caracteres de la cadena
    echo strlen($cadena);
    echo "<br></br>";
    //SUBSTR recorta la cadena a partir de la posicion
    $cad="PATITOS";
    echo substr($cad,2); // TITOS
    echo ' '. substr($cad,2,3); // TIT
    echo ' '.substr($cad,-2); // OS
    echo ' '.substr($cad,2,-3);
    echo "<br></br>";
    echo strtr("Holá a todos","áeiou", "  a  a");
    echo "<br></br>";
    echo strlen("á");
    echo "<br></br>";
    $cad="Hola a todos los presentes";
    echo substr_count($cad,"s");
    echo "<br></br>";
    echo nl2br("campo_BD\ncampo_DB2");
    echo "<br></br>";
    $cadena="Esto es\t un ejemplo\n cadena";
    $trozo=strtok($cadena," \t\n");
    echo $trozo;
    echo "<br></br>";
    while ($trozo != false) {
        $trozo=strtok(" \t\n");
        echo $trozo;
    }
?>