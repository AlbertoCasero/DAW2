<?php
    function sacarImagenes($tema){
    if (is_dir('temas')) {
        $dir = opendir('temas');
        while (($archivo = readdir($dir)) !== false) {
            if ($archivo == $tema) {
                if (is_dir('temas/' . $archivo)) {
                    $dir2 = opendir('temas/' . $archivo);
                    while (($archivo2 = readdir($dir2)) !== false) {
                        if ($archivo2 != '.' && $archivo2 != '..') {
                            echo "
                            <input type='radio' name='postal' value='temas/$archivo/$archivo2'>
                            <img src='temas/$archivo/$archivo2' alt='Postal de $archivo' width='300' height='200'>";
                        }
                    }
                    closedir($dir2);
                }
            }
        }
        closedir($dir);
    }
    }
?>
<html>
<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <body>
        <h1 class="text-center">ENVIO DE POSTALES</h1>
        <br><br>
            <?php
            session_start();
            $token = uniqid();
            $session = session_id();
            $_SESSION['token'] = $token;
            $_SESSION['id'] = $session;
            if(!isset($_POST['tema']))
            {
                echo "<form class='text-center' action='enviarPostal.php' method='post'>";
                    echo "<label for='tema'>Tema:</label>";
                    echo "<select name='tema' id='tema'>";
                    if(is_dir('temas')){
                        $dir = opendir('temas');
                        while (($archivo = readdir($dir)) !== false){
                            if ($archivo != '.' && $archivo != '..'){
                                echo "<option value='$archivo'>$archivo</option>";
                            }
                        }
                        closedir($dir);
                    }
                    echo "</select><br><br><br>";
                    echo "<input type='submit' value='Elegir tema'>";
                echo "</form>";
            }
            else
            {
                $tema=$_POST['tema'];
                echo "<form class='text-center' action='funciones.php' method='post'>";
                echo "<input type='hidden' name='tema' value='$tema'>";
                echo "<label for='correo'>Destinatario:</label>";
                $con = new mysqli("localhost", "admin", "1234");
                $con->select_db("empresa");
                $strsql = "SELECT email FROM clientes";
                echo "<select name='correo' id='correo' multiple required>";
                $result = $con->query($strsql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["email"] . "'>" . $row["email"] . "</option>";
                    }
                }
                echo "</select><br><br>";
                echo "<label for='mensaje'>Mensaje:</label>";
                echo "<input type='text' id='mensaje' name='mensaje'><br><br>";
                echo "Vista previa de la postal seleccionada:<br><br>";
                if (is_dir('temas')) {
                $dir = opendir('temas');
                    while (($archivo = readdir($dir)) !== false) {
                        if ($archivo != '.' && $archivo != '..') {
                            if($archivo==$tema){
                                sacarImagenes($archivo);
                            }
                        }
                    }
                    closedir($dir);
                }
                echo "<br><br><input type='submit' value='Enviar postal'>";
                echo "</form>";
            }
            ?>
    </body>
</html>