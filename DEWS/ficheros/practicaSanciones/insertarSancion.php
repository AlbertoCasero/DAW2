<html>
    <body>
        <?php
            $alumno=$_POST["alumno"];
            $sancion=$_POST["sancion"];
            $falta=$_POST["falta"];
            $alumno=explode(",DAW2",$alumno)[0];
            $ficheroDeAlumnos=fopen("AlumnosSancionados.txt","r+");
            if(!$ficheroDeAlumnos){
                die("Error: no se ha podido abrir el fichero de datos");
            }
            $contador = 0;
            while (fgets($ficheroDeAlumnos)){
                $contador++;
            }
            $alumnoSancionado=($contador+1).",".$alumno.",".date("d-m-Y").",".$falta.",".$sancion.",P";
            if(fwrite($ficheroDeAlumnos,$alumnoSancionado."\n")){
                echo "<br> La sancion del alumno: ". $alumno ." se ha registrado correctamente.";
            } else {
                echo "<br> Error al registrar la sancion.";
            }
            echo "<br><br><a href='sanciona.php'>Volver al menu principal</a>";
            fclose($ficheroDeAlumnos);
        ?>
    </body>
</html>