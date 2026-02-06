<?php
require_once 'funcionesPanelAdmin.php';
session_start();
if (!isset($_SESSION['token']) || $_SESSION['token'] !== $_GET['token']) {
    header("Location: login.php");
    exit();
}
$con = new PDO('mysql:host=localhost;dbname=cursoscp;charset=utf8', 'admin', '1234');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
abrirCerrarCurso($con);
eliminarCurso($con);
crearCurso($con);
if (isset($_POST['cerrarSesion'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
</head>
<body>
    <h1 class="text-center">Panel de Administrador</h1>
    <?php
    try {
        $strsql = "SELECT * FROM cursos";
        echo "<table class='table table-bordered' border='1px solid black'>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nombre</th>";
        echo "<th>Estado</th>";
        echo "<th>Número de Plazas</th>";
        echo "<th>Plazo de Inscripción</th>";
        echo "<th>Activar/Desactivar</th>";
        echo "<th>Eliminar</th>";
        echo "<th>Mostrar Listados</th>";
        echo "</tr>";
        if ($resu = $con->query($strsql)) {
            while ($fila = $resu->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                foreach ($fila as $valor) {
                    echo "<td>";
                    echo $valor . " ";
                    echo "</td>";
                }
                if ($fila['abierto'] == 1) {
                    echo "<td><form method='post' style='display:inline;'><input type='hidden' name='cerrar' value='".$fila['nombre']."'><button type='submit' class='btn btn-danger'>Cerrar Inscripciones</button></form></td>";
                } else {
                    echo "<td><form method='post' style='display:inline;'><input type='hidden' name='abrir' value='".$fila['nombre']."'><button type='submit' class='btn btn-success'>Abrir Inscripciones</button></form></td>";
                }
                echo "<td><form method='post' style='display:inline;'><input type='hidden' name='eliminar' value='".$fila['nombre']."'><button type='submit' class='btn btn-danger'>Eliminar Curso</button></form></td>";
                echo "<td><a href='listadoSolicitudes.php?curso=".$fila['codigo']."&token=".$_SESSION['token']."' class='btn btn-info'>Ver Listado</a></td>";
                echo "</tr>";
                echo "<br>";
            }
            $resu->closeCursor();
            $con = null;
        }
        echo "</table>";
        echo "<div class='center'>";
            echo "<h2>Crear Nuevo Curso</h2>";
            echo "<form action='panelAdmin.php?token=" . $_SESSION['token'] . "' method='post'>";
            echo "<label for='codigo'>Codigo del Curso:</label><br>";
            echo "<input type='text' name='codigo' id='codigo'><br><br>";
            echo "<label for='nombrecurso'>Nombre del Curso:</label><br>";
            echo "<input type='text' name='nombrecurso' id='nombrecurso'><br><br>";
            echo "<label for='abierto'>Abierto:</label><br>";
            echo "<input type='checkbox' name='abierto' id='abierto'><br><br>";
            echo "<label for='numeroplazas'>Numero de Plazas:</label><br>";
            echo "<input type='text' name='numeroplazas' id='numeroplazas'><br><br>";
            echo "<label for='plazoinscripcion'>Plazo de Inscripción:</label><br>";
            echo "<input type='text' name='plazoinscripcion' id='plazoinscripcion'><br><br>";
            echo "<button type='submit' name='crear' class='btn btn-primary'>Crear Curso</button>";
            echo "</form>";
            echo "<form action='panelAdmin.php?token=" . $_SESSION['token'] . "' method='post'><button type='submit' name='cerrarSesion' class='btn btn-secondary'>Cerrar Sesión</button></form>";
        echo "</div>";
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
    ?>
</body>
</html>