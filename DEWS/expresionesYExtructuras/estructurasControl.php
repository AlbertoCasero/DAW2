<?PHP
    print ("<UL>\n");
    $i=1;
    while ($i <= 5)
    {
    print ("<LI>Elemento $i</LI>\n");
    $i++;
    }
    print ("</UL>\n");
    $provincias['Toledo']=500000;
    $provincias['Ciudad Real']=60000;
    $provincias['Albacete']=20000;
    $provincias['Cuenca']=25000;
    $provincias['Guadalajara']=70000;
    /*foreach($provincias as $valor){
        echo " ".$valor;
    }*/
    foreach($provincias as $indice=>$valor){
        echo $indice." ".$valor. '<br>';
    }
?>