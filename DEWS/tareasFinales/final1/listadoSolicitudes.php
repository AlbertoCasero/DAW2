<?php
    require_once 'funcionesPanelAdmin.php';
    session_start();
    if (!isset($_SESSION['token']) || $_SESSION['token'] !== $_GET['token']) {
        header("Location: login.php");
        exit();
    }
    try {
        $con = new PDO('mysql:host=localhost;dbname=cursoscp;charset=utf8', 'admin', '1234');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        admitirSolicitante($con);
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Solicitados</title>
</head>
<body>
    <h1 class="text-center">Solicitantes</h1>
    <?php
    $codigoCurso = isset($_GET['curso']) ? $_GET['curso'] : '';
    $strsql = $con->prepare("SELECT dni, codigocurso, fechasolicitud, admitido FROM solicitudes WHERE codigocurso = ?");
    $strsql->execute([$codigoCurso]);
    echo "<table class='table table-bordered' border='1px solid black'>";
    echo "<tr>";
    echo "<th>DNI</th>";
    echo "<th>Codigo del Curso</th>";
    echo "<th>Fecha Solicitud</th>";
    echo "<th>Admitido</th>";
    echo "<th>Acción</th>";
    echo "</tr>";
    while ($fila = $strsql->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $fila['dni'] . "</td>";
        echo "<td>" . $fila['codigocurso'] . "</td>";
        echo "<td>" . $fila['fechasolicitud'] . "</td>";
        echo "<td>" . ($fila['admitido'] == 1 ? 'SI' : 'NO') . "</td>";
        echo "<td>
                <form method='post' style='display:inline;'>
                    <input type='hidden' name='dni' value='".$fila['dni']."'>
                    <input type='hidden' name='codigocurso' value='".$fila['codigocurso']."'>
                    <button type='submit' name='admitir' class='btn btn-success'>Admitir</button>
                </form>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<div class='center'><a href='panelAdmin.php?token=" . $_SESSION['token'] . "' class='btn btn-primary'>Volver al Panel de Admin</a></div>";
    $strsql->closeCursor();
    $con = null;
    ?>
</body>
</html>