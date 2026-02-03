<html>
    <body>
        <?php
            $nombre=$_GET["nombre"];
            $coments=$_GET["comentario"];
            $fichero=fopen("datos.txt","a+");
            fputs($fichero, "\n".$nombre."\n".$coments."\n-----------------------");
            echo "Los datos se guardaron correctamente: <br>";
            echo "--------------------------------";
            echo "<br>".$nombre;
            echo "<br>".$coments;
            fclose($fichero);
            echo "<br><a href='pagina3.php'>Ver fichero</a>"
        ?>
    </body>
</html>