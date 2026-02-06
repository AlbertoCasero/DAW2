<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
</head>

<body>
    <h1 class='text-center'>Panel de Usuario</h1><br>
    <h2 class='text-center'>Cursos Disponibles</h2>
    <?php
    session_start();
    if (!isset($_SESSION['token']) || $_SESSION['token'] !== $_GET['token']) {
        header("Location: login.php");
        exit();
    }
    try {
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
                echo "<td><button class='btn btn-primary'>Inscribirse</button></td>";
                echo "</tr>";
                echo "<br>";
            }
            $resu->closeCursor();
            $con = null;
        }
        echo "</table>";
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
    ?>
</body>

</html>