<?php/*
//EJERCICIO 1
    $palabra1="caracola";
    $palabra2="hOLA";
    $fina=substr($palabra1,-3);
    $finb=substr($palabra2,-3);
    $prefina=substr($palabra1,-2);
    $prefinb=substr($palabra2,-2);
    if (strcasecmp($fina,$finb)==0)
    echo "La palabra $palabra1 rima con $palabra2";
    elseif (strcasecmp($prefina,$prefinb)==0)
    echo "La palabra $palabra1 rima un poco con
    $palabra2";
    else
    echo "La palabra $palabra1 NO rima con
    $palabra2";
?>
<?php
//EJERCICIO 2
    $email="carmenduran@domenicoscarlatti.es";
    ((strstr($email,"@"))&&(strstr($email,".")))?print("e-mail
    correcto<br>"):print("e-mail incorrecto<br>");
    //var_dump(strstr($email,"@"));
    if((strstr($email,"@"))&&(strstr($email,".")))
    $email = explode("@",$email);
    echo "Usuario: $email[0]<br>";
    echo "Dominio: $email[1]<br>";
    // comprobar que la última ocurrencia del punto es posterior a @
    // aplicar strrpos() sobre . y @
*/?>
<html>
<body>
<H1>Ejercicio 3 cadenas</H1>
<?php
//EJERCICIO 3
$email="car/mendurán@domenicoscarlatti.es";
//((strstr($email,"@"))&&(strstr($email,".")))?print("e-mail
// correcto<br>"):print("e-mail incorrecto<br>");
//var_dump(strstr($email,"@"));
if((strstr($email,"@"))&&(strstr($email,".")))
$email = explode("@",$email);
echo "Usuario: $email[0]<br>";
echo "Dominio: $email[1]<br>";
$nombre_usuario= $email[0];
$valido=true;
//compruebo que el tamaño del string sea válido.
if (strlen($nombre_usuario)<3 ||strlen($nombre_usuario)>20)
{
echo $nombre_usuario . " no es válido, la longitud no
es la correcta<br>";
$valido=false;
}
//compruebo que los caracteres sean los permitidos
$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNO
PQRSTUVWXYZ0123456789-_";
for ($i=0; $i<strlen($nombre_usuario); $i++)
{
// strpos devuelve la posicion en $permitidos del primer caracter de la cadena que se le pasa como parámetro o FALSE
// substr devuelve una cadena de longitud 1 (tercer parámetro) a partir de la posición que indica $i
// como $i se va incrementado substr va conteniendo en cada iteracción uno de los caracteres del nombre de usuario
// y va viendo si está en la cadena de permitidos
if (strpos($permitidos, substr($nombre_usuario,
$i,1))===false){
echo $nombre_usuario . " no es válido contiene un
carácter invalido<br>";
$valido=false;
}
}
if($valido)
{
echo $nombre_usuario . " es válido<br><br>";
}
// 2ª FORMA Usando la función strspn
// strspn devuelve la longitud de la subcadena
// más larga que está formada sólo por caracteres contenidos en la máscara
$valido=true;
$longitud=strspn($nombre_usuario, $permitidos);
if (strlen($nombre_usuario)> $longitud){
$valido=false;
}
echo $nombre_usuario;
echo ($valido)?" es": " no es";
echo " valido";
?>
</body>
</html>