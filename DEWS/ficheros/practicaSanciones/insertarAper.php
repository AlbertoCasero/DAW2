<html>
    <link rel="stylesheet" href="sanciona.css">
    <body>
        <div id="formU">
            <form action="insertarSancion.php" method="post">
                Alumno apercibido: <select name="alumno">
                    <?php
                        $ficheroDeAlumnos=fopen("Alumnos.txt","r");
                        if(!$ficheroDeAlumnos){
                        die("Error: no se ha podido abrir el fichero de datos");
                        }
                        while (!feof($ficheroDeAlumnos)) {
                            echo "<option>";
                            echo fgets($ficheroDeAlumnos)."</option>";
                        }
                        fclose($ficheroDeAlumnos);
                    ?>
                </select><br><br>
                Tipo de falta: <input type="radio" name="falta" value="L">Leve
                <input type="radio" name="falta" value="G">Grave
                <input type="radio" name="falta" value="MG">Muy Grave<br><br>
                Sancion: <input type="text" name="sancion"><br><br>
                <input type="submit" value="Registrar sancion">
                <input type="reset" value="Reiniciar">
                <br><br><a href="sanciona.php">Menu Principal</a>
            </form>
        </div>
    </body>
</html>