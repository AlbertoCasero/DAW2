<?php
session_start();
if (!isset($_SESSION['token']) || $_SESSION['token'] !== $_GET['token']) {
    header("Location: login.php");
    exit();
}
require_once 'funcionesPanelUsuario.php';
try {
    $con = new PDO('mysql:host=localhost;dbname=cursoscp;charset=utf8', 'admin', '1234');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['inscribirse'])) {
        inscribirse($con);
    }
    $fechaBusqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : null;
} catch (PDOException $e) {
    $errorConexion = "Error de conexión: " . $e->getMessage();
}
?>
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
    <div class='center' style="text-align: center; margin-bottom: 20px;">
        <h1>Buscar Cursos</h1>
        <form action="panelUsuario.php?token=<?php echo $_GET['token']; ?>" method="post" style='display:inline;'>
            <label for="busqueda">Fecha:</label>
            <input type="date" name="busqueda" id="busqueda" value="<?php echo $fechaBusqueda; ?>" required>
            <br><br>
            <button type="submit" name="buscar" class="btn btn-primary">Buscar Cursos</button>
        </form>
        <form action="login.php" method="post" style='display:inline; margin-left: 10px;'>
            <button type="submit" name="cerrarSesion" class="btn btn-secondary">Cerrar Sesión</button><br><br>
            <a href="listaCursos.php">Volver al Menu Principal</a>
        </form>
    </div>
    <div class="container">
        <?php
        if (isset($errorConexion)) {
            echo "<div class='alert alert-danger'>" . $errorConexion . "</div>";
        } else {
            buscarCursos($con, $fechaBusqueda);
        }
        ?>
    </div>
</body>
</html>