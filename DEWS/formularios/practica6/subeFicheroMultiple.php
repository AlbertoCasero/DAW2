
<html><body><?php
$ficheros=$_FILES['fotos'];
echo '<pre>';
var_dump($ficheros);
echo '</pre>';
for($i=0;$i<3;$i++){
   echo "name:".$ficheros['name'][$i]."<br>";
   echo "tmp_name:".$ficheros['tmp_name'][$i]."<br>";
   echo "size:".$ficheros['size'][$i]."<br>";
   echo "type:".$ficheros['type'][$i]."<br>";
   if (is_uploaded_file ($ficheros['tmp_name'][$i])){
      $nombreDirectorio = "img/";
      $nombreFichero = $ficheros['name'][$i];
      $nombreCompleto = $nombreDirectorio.$nombreFichero;
      if (is_dir($nombreDirectorio)){  // es un directorio existente
          $idUnico = time();
          $nombreFichero = $idUnico."-".$nombreFichero;
          $nombreCompleto = $nombreDirectorio.$nombreFichero;
          move_uploaded_file ($ficheros['tmp_name'][$i],$nombreCompleto);
          echo "Fichero subido con el nombre: $nombreFichero<br>";
        }
        else echo 'Directorio definitivo inválido';
  }
else
    print ("No se ha podido subir el fichero<br>");
}
?>
</body></html>

