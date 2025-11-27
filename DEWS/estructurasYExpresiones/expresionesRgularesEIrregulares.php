<?php
/*$cadenas=array(
    'ro@9ca','aaroccca','roooccaaa','ssss'
);
$coincidencias= preg_grep('/^[^@]*$/',$cadenas);
foreach($coincidencias as $valor){
    echo $valor.' ';
}

*/
?>

<?php
/*Validar Email
function validarEmail($email){
  $reg = "#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i";
  return preg_match($reg, $email);
}
//ejemplo:
if(validarEmail("a@a.com")){
  echo "email valido";
} else {
  echo "email invalido";
}*/
?>

<?php
/*Validar Usuarios
function validarUsuario($nombre) {
  return preg_match("#^[a-z][\da-z_]{6,22}[a-z\d]\$#i", $nombre);
}
//ejemplo:
if(validarUsuario("alcassii81")){
  echo "usuario valido";
} else {
  echo "usuario invalido";
}*/
?>
<?php
/*Validar Fechas
function validarFecha($fecha){
  $sep = "[\/\-\.]";
  $req = "#^(((0?[1-9]|1\d|2[0-8]){$sep}(0?[1-9]|1[012])|(29|30){$sep}(0?[13456789]|1[012])|31{$sep}(0?[13578]|1[02])){$sep}(19|[2-9]\d)\d{2}|29{$sep}0?2{$sep}((19|[2-9]\d)(0[48]|[2468][048]|[13579][26])|(([2468][048]|[3579][26])00)))$#";
  return preg_match($reg, $fecha);
}
//ejemplo:
if(validarFecha("05/02/2011")){
  echo "fecha valida";
} else {
  echo "fecha invalida";
}*/
?>
<?php
/*Validar Direcciones IP
function validarIP($ip){
  $val_0_to_255 = "(25[012345]|2[01234]\d|[01]?\d\d?)";
  $reg = "#^($val_0_to_255\.$val_0_to_255\.$val_0_to_255\.$val_0_to_255)$#";
  return preg_match($reg, $ip, $matches);
}
//ejemplo:
if(validarIP("190.210.132.55")){
  echo "IP valida";
} else {
  echo "IP invalida";
}*/
?>

<?php
/*$colores=array('rojo','amarillo','rojo');
foreach($colores as $clave=>$valor){
    echo ' '. $valor;
}
echo(array_unshift($colores,'blanco'));
foreach($colores as $clave=>$valor){
    echo ' '. $valor;
};*/
/*
$temperatura=array('Madrid'=>25,'Cordoba'=>35,'Sevilla'=>40,'Galicia'=>15);
function aFarenheit(&$valor,$clave){
    $valor=$valor*1.8+32;
};
array_walk($temperatura,'aFarenheit');
foreach($temperatura as $valor){
    echo $valor.' ';
}
$matriz_destino=array('altura'=>185,'peso'=>85);
$matriz_origen=array('pelo'=>'moreno','peso'=>95);
var_dump(array_replace($matriz_destino, $matriz_origen));
*/
/*Splice sustituye los valores por la cadena que le pases
$colores=array('azul','verde','rojo','amarillo','marron','blanco');
array_splice($colores,0,1,'aaaaaaaaaaaaaa');
var_dump ($colores);
//Implode separa los valores de un array por la cadena que le pases.
echo implode(' ',$colores);
//Shuffle randomiza el array que le pasas, si lo quieres usar despues del shuffle hay que 
// saber que se queda randomizado
shuffle($colores);
print_r($colores);
$aa=array('Clara'=>2,'Ana'=>1,'Bea'=>3);
usort($aa);
print_r($aa);*/
$cols=array(
  'calidos'=>array(
    'rojo','naranja','amarillo'
  ),
  'frios'=>array(
    'azul','gris','morado','verde'
  ),
  'neutros'=>array(
    'beige','blanco','rosa'
  )
);
foreach($cols as $valor){
  foreach($valor as $valor1)
    $ores[]=$valor1;
}
sort($ores);
print_r($ores);
?>