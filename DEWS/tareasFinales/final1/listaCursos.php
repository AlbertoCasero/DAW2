<html>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <body>
        <?php
            session_start();
            $token = uniqid();
            $_SESSION['token'] = $token;
            echo "<h1 class='text-center'>LISTA DE CURSOS</h1>";
            echo "<div class='text-right'>";
                echo "<button class='btn btn-primary'><a href='registro.php?token=$token' style='color: white; text-decoration: none;'>Registrarse</a></button>";
                echo "<button class='btn btn-secondary'><a href='login.php?token=$token' style='color: white; text-decoration: none;'>Iniciar Sesión</a></button>";
            echo "</div>";
            try{
                $con = new PDO('mysql:host=localhost;dbname=cursoscp;charset=utf8', 'admin', '1234');
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $strsql = "SELECT nombre,abierto,numeroplazas,plazoinscripcion FROM cursos";
                echo "<table class='table table-bordered' border='1px solid black'>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Abierto</th>";
                echo "<th>Número de Plazas</th>";
                echo "<th>Plazo de Inscripción</th>";
                echo "</tr>";
                if ($resu = $con->query($strsql)) {
                    while ($fila = $resu->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        foreach ($fila as $valor) {
                            echo "<td>";
                            echo $valor . " ";
                            echo "</td>";
                        }
                        echo "</tr>";
                        echo "<br>";
                    }
                    $resu->closeCursor();
                    $con = null;
                }
                echo "</table>";
            }catch(PDOException $e){
                die("Error de conexión: " . $e->getMessage());
            }
        ?>
    </body>
</html>