<html><body>
Inserción de la fotografía del usuario:
<form action="subeFicheroMultiple.php" method="post" enctype="multipart/form-data">
<?php
	echo "Nombre álbum:<input type='text' name='album'/><br/><br>";
	for($i=0;$i<3;$i++){
		echo "Fichero con su fotografía:<input type='file' name='fotos[]'/><br/><br>";
	}
?>
<input type="submit" value="Enviar">
</form>
</body></html>
